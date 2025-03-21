<?php

namespace App\Filament\Resources\SistemSeleksiResource\Pages;

use App\Filament\Resources\SistemSeleksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSistemSeleksis extends ListRecords
{
    protected static string $resource = SistemSeleksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
