<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Rating\Models\Rating;

// ---- bases --

/**
 * Class RatingPanel.
 */
class RatingPanel extends XotBasePanel
{
    protected static string $model = 'Modules\Rating\Models\Rating';

    protected static string $title = 'title';

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @return string[]
     * @return string[]
     */
    public function with(): array
    {
        return ['post'];
    }

    /**
     * on select the option id.
     */

    /**
     * on select the option label.
     *
     * @param Rating $row
     */
    public function optionLabel($row): string
    {
        return (string) $row->title;
    }

    /**
     * @return object[]
     */
    public function fields(): array
    {
        return [
            // *
            (object) [
                'type' => 'Id',
                'name' => 'id',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'related_type',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'post.title',
            ],
            (object) [
                'type' => 'Decimal',
                'name' => 'pivot.rating',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'pivot.user_id',
            ],
            /*
            (object) [
            'type' => 'Text',
            'name' => 'post.subtitle',
            ],
            (object) [
            'type' => 'Textarea',
            'name' => 'post.txt',
            ],
             */
            // */
            /*
        (object) [
        'type' => 'Rating',
        'name' => 'myRatings',
        ],
         */
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
        return [];
    }

    /*
public function actions()
{
return [];
}

public function indexEdit(){
$params = optional(\Route::current())->parameters();
list($containers,$items)=params2ContainerItem($params);
}
public function bodyContentView($params=[]){
extract($params);
$route_params = optional(\Route::current())->parameters();
list($containers,$items)=params2ContainerItem($route_params);
//return $_layout->view_extend.'.body.multi_select';
return $_layout->view_extend.'.body.rating';
}
 */
}
