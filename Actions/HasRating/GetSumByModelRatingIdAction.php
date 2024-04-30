<?php

namespace Modules\Rating\Actions\HasRating;

use Spatie\QueueableAction\QueueableAction;
use Modules\Rating\Models\Contracts\HasRatingContract;



class GetSumByModelRatingIdAction{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(HasRatingContract $model,?string $rating_id=null): float
    {
        $opts=$model->ratings()
        ->wherePivot('user_id','!=',null);
        if($rating_id!==null){
            $opts=$opts->wherePivot('rating_id',$rating_id);
        }
        $opts=$opts->sum('rating_morph.value');
        
        return $opts;
    }
}