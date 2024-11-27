<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Rating\Filament\Resources\RatingMorphResource;

class ListRatingMorphs extends XotBaseListRecords
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
