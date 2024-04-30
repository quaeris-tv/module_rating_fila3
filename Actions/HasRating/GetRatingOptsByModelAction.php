<?php

namespace Modules\Rating\Actions\HasRating;

use Spatie\QueueableAction\QueueableAction;
use Modules\Rating\Models\Contracts\HasRatingContract;



class GetRatingOptsByModelAction{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(HasRatingContract $model): array
    {
        $opts=$model->ratings()
            ->wherePivot('user_id',null)
            ->pluck('title','ratings.id')
            ->toArray();
        return $opts;
    }
}