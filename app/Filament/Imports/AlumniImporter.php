<?php

namespace App\Filament\Imports;

use App\Models\Alumni;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class AlumniImporter extends Importer
{

    protected static ?string $model = Alumni::class;

    public function __construct()
    {
        // Konstruktor kosong untuk menghindari error
    }

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nisn'),
            ImportColumn::make('nama_lengkap'),
            ImportColumn::make('asal_kelas'),
            ImportColumn::make('foto'),
            ImportColumn::make('diterima_pada'),
            ImportColumn::make('jurusan'),
        ];
    }

    public function resolveRecord(): ?Alumni
    {
        // return Alumni::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Alumni();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your alumni import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
