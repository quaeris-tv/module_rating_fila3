<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;

class Rating
{
    public static function make(
        string $name = 'rating',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                Repeater::make('ratings')
                ->relationship()
                ->schema([
                    TextInput::make('title')->required(),
                    ColorPicker::make('color'),
                    SpatieMediaLibraryFileUpload::make('avatar'),
                        //->collection('avatars')
                ])
                ->reorderableWithButtons()
                ->reorderableWithDragAndDrop(true)
                ->columnSpanFull()
                ->columns(3),
            ])
            // ->reorderableWithButtons()
            // ->addActionLabel('Add member')
            // ->label('Link to article')
            ->columns('form' === $context ? 2 : 1);
    }
}
