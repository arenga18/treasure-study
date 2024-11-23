<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan logika password otomatis berdasarkan tanggal lahir
        if (empty($data['password']) && !empty($data['date_of_birth'])) {
            try {
                // Check if the date is in the expected format
                $date = Carbon::createFromFormat('Y-m-d', $data['date_of_birth']);
                $data['password'] = Hash::make($date->format('dmY'));
            } catch (\Exception $e) {
                // Log or handle the error if the date format is incorrect
                throw new \Exception('Invalid date format for date_of_birth. Expected format: Y-m-d.');
            }
        }

        return $data;
    }
}
