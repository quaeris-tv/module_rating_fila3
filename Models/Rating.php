<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

/**
 * Modules\Rating\Models\Rating.
 *
 * @property int                                                                      $id
 * @property string|null                                                              $related_type
 * @property string|null                                                              $created_by
 * @property string|null                                                              $updated_by
 * @property string|null                                                              $deleted_by
 * @property \Illuminate\Support\Carbon|null                                          $created_at
 * @property \Illuminate\Support\Carbon|null                                          $updated_at
 * @property int|null                                                                 $post_id
 * @property string|null                                                              $guid
 * @property string|null                                                              $image_src
 * @property string|null                                                              $lang
 * @property string|null                                                              $post_type
 * @property string|null                                                              $subtitle
 * @property string|null                                                              $title
 * @property string|null                                                              $txt
 * @property string|null                                                              $user_handle
 * @property \Modules\Lang\Models\Post|null                                           $post
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Lang\Models\Post> $posts
 * @property int|null                                                                 $posts_count
 * @property mixed                                                                    $url
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating        whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 *
 * @mixin \Eloquent
 */
class Rating extends BaseModelLang
{
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'related_type'];

    // -------- relationship -----
    // -------- mutators ---------
    /*
    public function getRatingAvgAttribute($value){
        return $this->ratingMorph()->avg('rating');
    }
    */
}
