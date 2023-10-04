<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

/**
 * Modules\Rating\Models\RatingMorph.
 *
 * @property int                                $id
 * @property string|null                        $post_type
 * @property int|null                           $post_id
 * @property int|null                           $value
 * @property string|null                        $created_by
 * @property string|null                        $updated_by
 * @property string|null                        $deleted_by
 * @property \Illuminate\Support\Carbon|null    $created_at
 * @property \Illuminate\Support\Carbon|null    $updated_at
 * @property int|null                           $user_id
 * @property int                                $rating_id
 * @property \Modules\Rating\Models\Rating|null $rating
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph query()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereValue($value)
 *
 * @mixin \Eloquent
 */
class RatingMorph extends BaseMorphPivot
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'rating_id', /* 'related_type', */
        'value',
        'user_id',
    ];

    // -------- RELATIONSHIP -----------

    public function rating(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rating::class); // , 'id', 'rating_id');
    }
}
