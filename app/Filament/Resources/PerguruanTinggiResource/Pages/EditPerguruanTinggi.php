<?php

namespace App\Filament\Resources\PerguruanTinggiResource\Pages;

use App\Filament\Resources\PerguruanTinggiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerguruanTinggi extends EditRecord
{
    protected static string $resource = PerguruanTinggiResource::class;

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
