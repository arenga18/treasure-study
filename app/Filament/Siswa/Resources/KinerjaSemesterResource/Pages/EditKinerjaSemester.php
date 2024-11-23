<?php

namespace App\Filament\Siswa\Resources\KinerjaSemesterResource\Pages;

use App\Filament\Siswa\Resources\KinerjaSemesterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKinerjaSemester extends EditRecord
{
    protected static string $resource = KinerjaSemesterResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ambil pengguna yang sedang login
        $currentUser = auth()->user();

        if ($currentUser && isset($currentUser->nisn)) {
            $data['nisn'] = $currentUser->nisn;
        }

        return $data;
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
