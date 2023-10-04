<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class RatingMorph extends BaseMorphPivot
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'model_id', 'model_type',
        'rating_id',
        'user_id',
        'note',
        'value',
    ];
    // -------- RELATIONSHIP -----------

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class);
    }
}
