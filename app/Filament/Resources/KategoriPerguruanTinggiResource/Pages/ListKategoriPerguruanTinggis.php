<?php

namespace App\Filament\Resources\KategoriPerguruanTinggiResource\Pages;

use App\Filament\Resources\KategoriPerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriPerguruanTinggis extends ListRecords
{
    protected static string $resource = KategoriPerguruanTinggiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
