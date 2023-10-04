<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels;

use Illuminate\Contracts\Support\Renderable;
// --- Services --

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Xot\Contracts\RowsContract;

/**
 * Class FavoritePanel.
 */
class FavoritePanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Rating\Models\Favorite';

    /**
     * index navigation.
     */
    public function indexNav(): ?Renderable
    {
        if (! inAdmin()) {
            /**
             * @phpstan-var view-string
             */
            $view = 'rating::favorites.index.nav';

            return view($view);
        }

        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public function indexQuery(array $data, $query)
    {
        return $query->where('user_id', Auth::id())
            // ->with('linkable')
        ;
    }

    /**
     * @return string[]
     */
    public function search(): array
    {
        return [
            'linkable.title', 'linkable.txt',
        ];
    }

    /*
    public function filters(Request $request = null): array {
        // dddx($request);

        return [
            (object) [
                'param_name' => 'q', // nome dell'input
                'field_name' => 'post.title', // nome del campo collegato
                // 'rules' => 'required',
                // 'op'=>'=',
            ],
            (object) [
                'param_name' => 'start_with',
                'field_name' => 'starts_with:foo,bar,...',
                // 'rules' => 'required',
                // 'op'=>'=',
            ],
        ];
    }
    */

    /**
     * @return object[]
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
                'type' => 'BigInt',
                'name' => 'post_id',
                'comment' => null,
            ],
            2 => (object) [
                'type' => 'String',
                'name' => 'post_type',
                'comment' => null,
            ],
            3 => (object) [
                'type' => 'Integer',
                'name' => 'user_id',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [
            new Actions\Favorite\NoMoreFavoriteAction(Auth::id()),
        ];
    }
}
