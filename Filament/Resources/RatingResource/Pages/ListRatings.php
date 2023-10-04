<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Rating\Filament\Resources\RatingResource;

class ListRatings extends ListRecords {
    protected static string $resource = RatingResource::class;

    protected function getActions(): array {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
