<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Blocks;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Modules\UI\Filament\Forms\Components\RadioImage;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;
use Modules\Xot\Datas\XotData;

class Rating
{
    public static function make(
        string $name = 'rating',
        string $context = 'form',
    ): Block {
        // $view = 'rating::components.blocks.rating.v1';
        // $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);

        $options = app(GetViewBlocksOptionsByTypeAction::class)
            ->execute('rating', true);

        // dddx(get_class_methods(Repeater::class));
        $primary_lang = XotData::make()->primary_lang;

        return Block::make($name)
            ->schema([
                // Select::make('view')

                //     ->options($options),

                RadioImage::make('view')
                    ->options($options),

                Repeater::make('ratings')
                    ->visible(fn (Get $get, $record): bool => $record?->getLocale() === $primary_lang)
                    ->relationship()
                    ->schema([
                        // TextInput::make('id')->readonly(),
                        TextInput::make('id')->disabled(),
                        TextInput::make('title')->required(),
                        ColorPicker::make('color'),
                        SpatieMediaLibraryFileUpload::make('rating')
                            ->collection('rating'),
                    ])
                    ->reorderableWithButtons()
                    ->reorderableWithDragAndDrop(true)
                    ->columnSpanFull()
                    ->columns(4)
                    ->live()

                // ->deleteAction(
                //     fn(Action $action) => $action->after(fn(Get $get, Set $set) => self::doSomething($get, $set)),
                //     // function(Action $action){
                //     //     // return $action->after(fn(Get $get, Set $set) => self::updateTotals($get, $set))
                //     //     return $action->after(function(Get $get, Set $set){
                //     //         // dddx([$get, $set]);
                //     //         dddx($get);
                //     //     });
                //     // }
                // )
                ,
            ])
            // ->reorderableWithButtons()
            // ->addActionLabel('Add member')
            //
            // ->columns('form' === $context ? 2 : 1);
            ->columns(1);
    }

    // // https://laraveldaily.com/post/filament-repeater-live-calculations-on-update
    // public static function doSomething(Get $get, Set $set): void
    // {
    //     // dddx(get_defined_vars());
    //     dddx(get_class_methods($get));
    // }
}
