<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Rating\Filament\Actions\Header;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
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
            ->modalWidth('xl')
            ->form(
                fn (Action $action): array => [
                    Select::make('user_id')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->required(),
                    Select::make('rating_id')
                        ->relationship(name: 'ratings', titleAttribute: 'title')
                        // ->suffixIcon('icon-bottlecap')
                        ->required(),
                    TextInput::make('credits')
                        ->integer()
                        ->required()
                        ->suffixIcon('icon-bottlecap'),
                ]
            )->action(function (array $data, $record): void {
                dddx(['data' => $data, 'record' => $record]);
            });
    }
}
