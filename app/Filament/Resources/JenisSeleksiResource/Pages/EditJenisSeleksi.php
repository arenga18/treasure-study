<?php

namespace App\Filament\Resources\JenisSeleksiResource\Pages;

use App\Filament\Resources\JenisSeleksiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisSeleksi extends EditRecord
{
    protected static string $resource = JenisSeleksiResource::class;

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
