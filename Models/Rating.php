<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Rating\Enums\RuleEnum;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

/**
 * Modules\Rating\Models\Rating.
 *
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 * @property RuleEnum                                          $rule
 *
 * @method static Builder|Rating newModelQuery()
 * @method static Builder|Rating newQuery()
 * @method static Builder|Rating query()
 * @method static Builder|Rating withExtraAttributes()
 *
 * @mixin \Eloquent
 */
class Rating extends BaseModel
{
    protected $fillable = [
        'id',
        'extra_attributes',
        'title',
        'color',
        'txt',
        'rule',
        'is_disabled',
        'is_readonly',
        'order_column',
    ];

    public $casts = [
        'extra_attributes' => SchemalessAttributes::class,
        'rule' => RuleEnum::class,
        'is_disabled' => 'boolean',
        'is_readonly' => 'boolean',
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function linkedTo()
    {
        return $this->morphTo('model');
    }
}
