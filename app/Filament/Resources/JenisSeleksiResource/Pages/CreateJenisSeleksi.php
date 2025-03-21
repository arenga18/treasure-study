<?php

namespace App\Filament\Resources\JenisSeleksiResource\Pages;

use App\Filament\Resources\JenisSeleksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisSeleksi extends CreateRecord
{
    protected static string $resource = JenisSeleksiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
