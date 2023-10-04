<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

// ------- services ----
// ------- traits ---

// ------- services ----

/**
 * Modules\Rating\Models\Favorite.
 *
 * @property int                                                     $id
 * @property string|null                                             $post_type
 * @property int|null                                                $post_id
 * @property int|null                                                $user_id
 * @property string|null                                             $created_by
 * @property string|null                                             $updated_by
 * @property \Illuminate\Support\Carbon|null                         $created_at
 * @property \Illuminate\Support\Carbon|null                         $updated_at
 * @property \Illuminate\Database\Eloquent\Collection<int, Favorite> $favorites
 * @property int|null                                                $favorites_count
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent           $linkable
 * @property \Illuminate\Database\Eloquent\Collection<int, Favorite> $myFavorites
 * @property int|null                                                $my_favorites_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Favorite extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'post_id', 'post_type', 'user_id'];

    /**
     * Relations.
     */
    public function favorites(): MorphMany
    {
        return $this->morphMany(self::class, 'post');
    }

    public function myFavorites(): MorphMany
    {
        return $this->morphMany(self::class, 'post')
            ->where('user_id', \Auth::id());
    }

    public function isMyFavorited(): bool
    {
        return $this->favorites()
            ->where('user_id', \Auth::id())->count() > 0;
    }

    public function linkable(): MorphTo
    {
        // dddx(Favorite::where('post_type','LIKE','%media%')->delete());

        return $this->morphTo('post');
    }
}
