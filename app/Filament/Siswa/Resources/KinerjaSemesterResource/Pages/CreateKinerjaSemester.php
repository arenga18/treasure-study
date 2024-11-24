<?php

namespace App\Filament\Siswa\Resources\KinerjaSemesterResource\Pages;

use App\Filament\Siswa\Resources\KinerjaSemesterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKinerjaSemester extends CreateRecord
{
    protected static string $resource = KinerjaSemesterResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan NISN berdasarkan pengguna yang login
        $currentUser = auth()->user();
        if ($currentUser) {
            $data['nisn'] = $currentUser->nisn;
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
