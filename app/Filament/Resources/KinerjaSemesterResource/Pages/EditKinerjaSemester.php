<?php

namespace App\Filament\Resources\KinerjaSemesterResource\Pages;

use App\Filament\Resources\KinerjaSemesterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKinerjaSemester extends EditRecord
{
    protected static string $resource = KinerjaSemesterResource::class;

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
