<?php

declare(strict_types=1);

namespace Modules\Rating\Actions\HasRating;

use Modules\Rating\Models\Contracts\HasRatingContract;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 1d9c123 (Check & fix styling)

class GetSumByModelRatingIdAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(HasRatingContract $model, ?string $rating_id = null): float
    {
        $opts = $model->ratings()
        ->wherePivot('user_id', '!=', null);
        if (null !== $rating_id) {
            $opts = $opts->wherePivot('rating_id', $rating_id);
        }
<<<<<<< HEAD
        $opts = (float) $opts->sum('rating_morph.value');
        Assert::float($opts, '['.__LINE__.']['.__FILE__.']');
=======
        $opts = $opts->sum('rating_morph.value');
>>>>>>> 1d9c123 (Check & fix styling)

        return $opts;
    }
}
