<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Rating\Filament\Actions\Header;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Blog\Datas\RatingArticleData;
use Modules\Blog\Aggregates\ArticleAggregate;
use Modules\Blog\Datas\RatingArticleWinnerData;
use Modules\Rating\Actions\HasRating\GetRatingOptsByModelAction;

class WinHeaderAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'win_action';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel();

        $this->label('')
            ->icon('heroicon-o-trophy')
            ->tooltip(trans('rating::txt.win'))
            ->modalWidth('xl')
            ->form(
                fn (Action $action): array => [
                    Select::make('rating_id')
                        ->label('domanda vincente')
                        ->options(function($record){
                            return app(GetRatingOptsByModelAction::class)->execute($record);
                        })
                        ->suffixIcon('heroicon-o-question-mark-circle')
                        ->required(),
                ]
            )->action(function (array $data, $record): void {
                $command = RatingArticleWinnerData::from([
                    'articleId' => $record->getKey(),
                    'ratingId' => $data['rating_id'],
                ]);

                ArticleAggregate::retrieve($command->articleId)
                    ->winner($command);
            });
    }
}
