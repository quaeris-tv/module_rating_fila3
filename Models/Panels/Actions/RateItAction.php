<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels\Actions;

// -------- services --------

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Session;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\UI\Services\ThemeService;

// -------- bases -----------

/**
 * Class RateItAction.
 */
class RateItAction extends XotBasePanelAction
{
    public ?string $name = 'rate';
    public bool $onItem = true;
    public string $icon = '<span class="font-white"><i class="fa fa-star"></i> Vota !</span>';

    /*
    public function btn(array $params = []): string {
        extract($params);
        if (! isset($row)) {
            return 'row not set';
        }

        $this->setRow($row);
        $url = $this->urlItem($params);
        $title = 'Vota '.$this->row->title;

        $ratings = optional($row->ratings);
        $parz = [];
        $parz['rating_avg'] = round($ratings->avg('pivot.rating'), 2);
        $parz['rating_count'] = $ratings->count('pivot.rating');
        $parz['rating_url'] = $url;
        $parz['title'] = $title;

         @phpstan-var view-string

        $view = 'blog::actions.rate.btn';

        return view($view)->with($parz);
    }
     */

    // -- Perform the action on the given models.

    public function handle(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'blog::actions.rate';
        /*
        return ThemeService::v1iew($view)
            ->with('row', $this->row)
        ;
        */
        $view_params = [
            'row' => $this->row,
        ];

        return view($view, $view_params);
    }

    // end handle

    public function postHandle()
    {
        // $panel = $this->updateRow(['row' => $this->row]);
        $panel = $this->panel->update(request()->all());
        $swal = [
            'icon' => 'success',
            'title' => 'Grazie di aver votato',
            // 'text'=> 'clicca su back per torn!',
        ];
        Session::flash('swal', $swal);
        $this->setRow($panel->getRow());

        return $this->handle();
    }
}
