<?php

namespace App\Filament\Resources\KripeResource\Pages;

use App\Filament\Resources\KripeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKripes extends ListRecords
{
    protected static string $resource = KripeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
