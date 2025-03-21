<?php

namespace App\Filament\Resources\TahunLulusResource\Pages;

use App\Filament\Resources\TahunLulusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTahunLulus extends EditRecord
{
    protected static string $resource = TahunLulusResource::class;

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
