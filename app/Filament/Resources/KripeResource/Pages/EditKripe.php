<?php

namespace App\Filament\Resources\KripeResource\Pages;

use App\Filament\Resources\KripeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKripe extends EditRecord
{
    protected static string $resource = KripeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
