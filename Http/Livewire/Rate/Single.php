<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Livewire\Rate;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Cms\Services\PanelService;
use Modules\Rating\Models\RatingMorph;

/**
 * Class Single.
 */

//
// meglio spostare tutto in form_data
//
//

class Single extends Component
{
    public Model $model;

    public Model $goal;

    public ?int $val;

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
    public function mount(Model $model, Model $goal): void
    {
        $this->model = $model;
        $this->goal = $goal;
        $this->post_type = PanelService::make()->get($model)->postType();
        $id = $model->getKey();
        if (! \is_int($id)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->post_id = $id;
        $this->user_id = \Auth::id();
        $this->modal_guid = 'modalrateit';
        $this->modal_title = 'Vota';
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
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        $where = [
            'post_type' => $this->post_type,
            'post_id' => $this->post_id,
            'rating_id' => $this->goal->getKey(),
            'user_id' => $this->user_id,
        ];

        $val = RatingMorph::firstWhere($where);

        $this->val = null;
        if (\is_object($val)) {
            $this->val = (int) $val->value;
        }
        $view_params = [
            'view' => $view,
            'time' => rand(1, 1000),
        ];

        return view($view, $view_params);
    }

    public function update(int $val): void
    {
        session()->flash('message', 'Users Created Successfully.['.$val.']');
        $data = [
            'user_id' => $this->user_id,
            'post_type' => $this->post_type,
            'post_id' => $this->post_id,
            'rating_id' => $this->goal->getKey(),
        ];
        $morph = RatingMorph::firstOrCreate($data);
        $morph->value = $val;
        $morph->save();
    }
}
