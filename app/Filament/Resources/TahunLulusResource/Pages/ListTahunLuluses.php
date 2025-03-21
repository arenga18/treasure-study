<?php

namespace App\Filament\Resources\TahunLulusResource\Pages;

use App\Filament\Resources\TahunLulusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTahunLuluses extends ListRecords
{
    protected static string $resource = TahunLulusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
