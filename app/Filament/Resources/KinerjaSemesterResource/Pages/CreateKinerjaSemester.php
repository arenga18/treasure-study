<?php

namespace App\Filament\Resources\KinerjaSemesterResource\Pages;

use App\Filament\Resources\KinerjaSemesterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Carbon\Carbon;

class CreateKinerjaSemester extends CreateRecord
{
    protected static string $resource = KinerjaSemesterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
