<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Rating\Datas;

use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class RatingData extends Data
{
    public string $user_id;

    public string $model_id;

    public string $model_type;

    public string $rating_id;

    public float $value;
}
