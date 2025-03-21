<?php

namespace App\Filament\Resources\SistemSeleksiResource\Pages;

use App\Filament\Resources\SistemSeleksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSistemSeleksi extends EditRecord
{
    protected static string $resource = SistemSeleksiResource::class;

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
