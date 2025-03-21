<?php

namespace App\Filament\Resources\PerguruanTinggiResource\Pages;

use App\Filament\Resources\PerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerguruanTinggi extends CreateRecord
{
    protected static string $resource = PerguruanTinggiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
