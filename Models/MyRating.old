<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

/**
 * Modules\Rating\Models\MyRating.
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
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      query()
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating      whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 *
 * @mixin \Eloquent
 */
class MyRating extends BaseModelLang
{
    /**
     * @var string
     */
    protected $table = 'ratings';
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'my_rating', 'related_type'];
    /**
     * @var string[]
     */
    protected $appends = ['my_rating'];
}
