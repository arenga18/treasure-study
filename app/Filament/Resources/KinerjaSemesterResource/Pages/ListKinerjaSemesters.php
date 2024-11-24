<?php

namespace App\Filament\Resources\KinerjaSemesterResource\Pages;

use App\Filament\Resources\KinerjaSemesterResource;
use App\Models\KinerjaSemester;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Closure;

class ListKinerjaSemesters extends ListRecords
{
    protected static string $resource = KinerjaSemesterResource::class;
}
