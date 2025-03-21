<?php

namespace App\Filament\Resources\TahunLulusResource\Pages;

use App\Filament\Resources\TahunLulusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTahunLulus extends CreateRecord
{
    protected static string $resource = TahunLulusResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
