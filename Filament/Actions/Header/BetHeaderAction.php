<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Rating\Filament\Actions\Header;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Blog\Aggregates\ArticleAggregate;
use Modules\Blog\Datas\RatingArticleData;

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
            ->tooltip(trans('rating::txt.bet'))
            ->modalWidth('xl')
            ->form(
                fn (Action $action): array => [
                    Select::make('user_id')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->suffixIcon('heroicon-o-user')
                        ->required(),
                    Select::make('rating_id')
                        //->relationship(name: 'ratings', titleAttribute: 'title')
                        ->options(function($record){
                            $opts=$record
                                ->ratings()
                                ->wherePivot('user_id',null)
                                ->pluck('title','ratings.id')
                                ->toArray();
                            return $opts;
                        })
                        ->suffixIcon('heroicon-o-question-mark-circle')
                        ->required(),
                    TextInput::make('credits')
                        ->integer()
                        ->required()
                        ->suffixIcon('icon-bottlecap'),
                ]
            )->action(function (array $data, $record): void {
                $command = RatingArticleData::from([
                    'userId' => $data['user_id'],
                    'articleId' => $record->getKey(),
                    'ratingId' => $data['rating_id'],
                    'credit' => $data['credits'],
                ]);

                ArticleAggregate::retrieve($command->articleId)
                    ->rating($command);
            });
    }
}
