<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class MyRatingPanel.
 */
class MyRatingPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\Rating\Models\MyRating';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * Get the fields displayed by the resource.
     * 'value'=>'..',.
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'my_rating',
                'comment' => 'not in Doctrine',
            ],
            (object) [
                'type' => 'String',
                'name' => 'related_type',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }

    /*// deprecated ??
    public function bodyContentView(array $params = []) {
        //dddx($params);
        extract($params);
        //$route_params = optional(\Route::current())->parameters();
        //list($containers,$items)=params2ContainerItem($route_params);
        if ('index_edit' == $_layout->act) {
            //return $_layout->view_extend.'.body.multi_select';
            return $_layout->view_extend.'.body.pivot_fields';
        } else {
            return $_layout->view_extend.'.body_content'; //.'.index';
        }
        //return $_layout->view_extend.'.body.rating';
    }
    //*/

    /**
     * @return string
     */
    public function indexEditSpecialCase()
    {
        return 'LOGGATI PER VOTARE';
    }
}
