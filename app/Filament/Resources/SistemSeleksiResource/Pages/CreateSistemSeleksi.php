<?php

namespace App\Filament\Resources\SistemSeleksiResource\Pages;

use App\Filament\Resources\SistemSeleksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSistemSeleksi extends CreateRecord
{
    protected static string $resource = SistemSeleksiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
