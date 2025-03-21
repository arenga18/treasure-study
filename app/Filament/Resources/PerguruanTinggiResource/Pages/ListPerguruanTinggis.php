<?php

namespace App\Filament\Resources\PerguruanTinggiResource\Pages;

use App\Filament\Resources\PerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerguruanTinggis extends ListRecords
{
    protected static string $resource = PerguruanTinggiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
