<?php

namespace App\Filament\Resources\KategoriPerguruanTinggiResource\Pages;

use App\Filament\Resources\KategoriPerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriPerguruanTinggi extends EditRecord
{
    protected static string $resource = KategoriPerguruanTinggiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
