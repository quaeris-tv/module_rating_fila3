<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Rating\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\Rating\Models\Rating;
use Modules\Rating\Models\RatingMorph;

/**
 * Trait HasRating.
 */
trait HasRating
{
    public function ratings(): MorphToMany
    {
        $class = static::class;
        $alias = Str::of(class_basename($class))->snake()->toString();

        Relation::morphMap([
            $alias => $class,
        ]);

        $pivot_class = RatingMorph::class;
        $pivot = app($pivot_class);
        $pivot_table = $pivot->getTable();
        $pivot_db_name = $pivot->getConnection()->getDatabaseName();
        $pivot_table_full = $pivot_db_name.'.'.$pivot_table;
        $pivot_fields = $pivot->getFillable();

        return $this->morphToMany(Rating::class, 'model', $pivot_table_full)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
    }

    public function getOptionRatingsIdTitle(): array
    {
        // return $this->ratings()->where('user_id', null)->get();
        return Arr::pluck($this->ratings()->where('user_id', null)->get()->toArray(), 'title', 'id');
    }

    public function getOptionRatingsIdColor(): array
    {
        // return $this->ratings()->where('user_id', null)->get();
        return Arr::pluck($this->ratings()->where('user_id', null)->get()->toArray(), 'color', 'id');
    }

    public function getArrayRatingsWithImage(): array
    {
        $ratings = $this
            ->ratings()
        // ->with('media')
            ->where('user_id', null)
            ->get();
        // ->toArray()

        $ratings_array = [];

        foreach ($ratings as $key => $rating) {
            $ratings_array[$key] = $rating->toArray();
            if (empty($rating->getFirstMediaUrl('rating'))) {
                $rating->addMediaFromUrl('https://picsum.photos/id/'.rand(1, 200).'/300/200')
                    ->toMediaCollection('rating');
            }
            $ratings_array[$key]['image'] = $rating->getFirstMediaUrl('rating');
            $ratings_array[$key]['effect'] = false;
        }

        return $ratings_array;
    }

    public function getBettingUsers(): int
    {
        return count(RatingMorph::where('model_id', $this->id)
            ->where('user_id', '!=', null)
            ->groupBy('user_id')
            ->get()
            ->toArray());
    }

    public function getVolumeCredit(?int $rating_id = null): float
    {
        $ratings = RatingMorph::where('model_id', $this->id)
            ->where('user_id', '!=', null);

        if (null != $rating_id) {
            $ratings = $ratings->where('rating_id', $rating_id);
        }

        $ratings = $ratings->get();

        $tmp = 0;

        foreach ($ratings as $rating) {
            $tmp += $rating->value;
        }

        return intval($tmp);
    }

    public function getRatingsPercentageByUser(): array
    {
        $ratings_options = $this->getOptionRatingsIdTitle();
        $result = [];

        foreach ($ratings_options as $key => $value) {
            $b = RatingMorph::where('model_id', $this->id)
                ->where('user_id', '!=', null)
                ->count();

            if (0 == $b) {
                $b = 1;
            }

            $a = RatingMorph::where('model_id', $this->id)
                ->where('user_id', '!=', null)
                ->where('rating_id', $key)
                ->count();

            $result[$key] = round((100 * $a) / $b, 0);
        }

        return $result;
    }

    public function getRatingsPercentageByVolume(): array
    {
        $ratings_options = $this->getOptionRatingsIdTitle();
        $result = [];

        $total_volume = $this->getVolumeCredit();
        if (0 == $total_volume) {
            $total_volume = 1;
        }

        foreach ($ratings_options as $key => $value) {
            $result[$key] = round(($this->getVolumeCredit($key) * 100) / $total_volume, 0);
        }

        return $result;
    }
}
