<?php

namespace App\Filament\Resources\KategoriPerguruanTinggiResource\Pages;

use App\Filament\Resources\KategoriPerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriPerguruanTinggi extends CreateRecord
{
    protected static string $resource = KategoriPerguruanTinggiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
