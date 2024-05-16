<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Cms\Services\PanelService;
use Modules\Rating\Models\Favorite as FavoriteModel;

/**
 * Class RateIt.
 */
class RateIt extends Component
{
    // public $model;

    public int $post_id;

    public string $post_type;

    /**
     * @var int|string|null
     */
    public $user_id;

    // --------------

    public string $modal_guid;

    public string $modal_title;

    // public $fav;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function mount(Model $model): void
    {
        $this->post_type = PanelService::make()->get($model)->postType();
        /**
         * @var int
         */
        $id = $model->getKey();
        $this->post_id = $id;
        $this->user_id = Auth::id();
        $this->modal_guid = 'modalrateit';
        $this->modal_title = 'Vota';
        /*
        $fav = FavoriteModel::where('user_id', $this->user_id)
            ->where('post_type', $this->post_type)
            ->where('post_id', $this->post_id)
            ->first();

        $this->fav = false;
        if (is_object($fav)) {
            $this->fav = true;
        }
        */
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render()
    {
        /*
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        $view_params = [
            'view' => $view,
            'time' => rand(1, 1000),
        ];

        return view($view, $view_params);
    }
}
