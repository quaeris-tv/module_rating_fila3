<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

// ----- actions ---

/**
 * Class RatingMorphPanel.
 */
class RatingMorphPanel extends XotBasePanel
{
    protected static string $model = 'Modules\Rating\Models\RatingMorph';

    protected static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array
    {
        // $route_params = optional(\Route::current())->parameters();
        [$containers, $items] = params2ContainerItem();

        return [
            /*
            (object) [
            'type' => 'Id',
            'name' => 'id',
            ],
            (object) [
            'type' => 'Integer',
            'name' => 'post_id',
            ],
            (object) [
            'type' => 'Text',
            'name' => 'post_type',
            ],
            (object) [
            'type' => 'Text',
            'name' => 'related_id',
            ],
             */
            /*
            (object) [
            'type' => 'Hidden',
            'name' => 'related_type',
            ],
             */
            /*
            (object) [
            'type' => 'Text',
            'name' => 'title',
            'comment' => 'not in Doctrine',
            ],
             */
            /*
            (object) [
            'type'     => 'Decimal',
            'sub_type' => 'JqStar',
            //'sub_type'=>'VueStar',
            'name'     => 'rating',
            ],
             */
            (object) [
                'type' => 'Rating',
                // 'sub_type' => 'JqStar',
                // 'sub_type'=>'VueStar',
                'name' => 'myRatings',
                'parent' => last($items),
            ],
            /*
        (object) [
        'type' => 'Hidden',
        'name' => 'user_id',
        ],
        //*/
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return [];
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [
            new Actions\RateItAction(),
        ];
    }
}
