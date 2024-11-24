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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['password']) && !empty($data['date_of_birth'])) {
            try {
                $date = Carbon::createFromFormat('Y-m-d', $data['date_of_birth']);
                $data['password'] = Hash::make($date->format('dmY'));
            } catch (\Exception $e) {
                throw new \Exception('Invalid date format for date_of_birth. Expected format: Y-m-d.');
            }
        }

        return $data;
    }
}
