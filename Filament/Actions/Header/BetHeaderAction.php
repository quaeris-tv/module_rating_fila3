<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);


namespace Modules\Rating\Filament\Actions\Header;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class BetHeaderAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'bet_action';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel();

        $this->label('')
            ->icon('icon-bottlecap')
            ->tooltip(trans('rating:txt.bet'))
            //->color('secondary')
            ->modalWidth('xl')
            ->form(
                fn (Action $action): array => [
                    TextInput::make('aa'),
                ]
            );
    }
}
