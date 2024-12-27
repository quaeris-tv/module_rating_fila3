<?php

declare(strict_types=1);

namespace Modules\Rating\Filament\Resources\RatingMorphResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Rating\Filament\Resources\RatingMorphResource;

class EditRatingMorph extends EditRecord
{
    protected static string $resource = RatingMorphResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
