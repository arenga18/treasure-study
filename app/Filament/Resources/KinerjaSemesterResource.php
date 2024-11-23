<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KinerjaSemesterResource\Pages;
use App\Models\KinerjaSemester;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Infolist;
use IbrahimBougaoua\FilaProgress\Tables\Columns\CircleProgress;
use Filament\Infolists\Components\Section;

class KinerjaSemesterResource extends Resource
{
    protected static ?string $model = KinerjaSemester::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        $record = $infolist->getRecord();
        $nisn = $record->nisn;


        // Retrieve all semesters based on nisn
        $semesters = KinerjaSemester::where('nisn', $nisn)->get();

        var_dump($semesters);

        // Return the infolist schema with the filtered data
        return $infolist
            ->schema(function () use ($semesters) {
                $sections = [];  // Initialize an array for the sections

                foreach ($semesters as $semester) {
                    // Create a section for each semester
                    $sections[] = Section::make('Semester ' . $semester->semester)
                        ->schema([
                            TextEntry::make('ips_terakhir')
                                ->label('IPS Terakhir')
                                ->default($semester->ips_terakhir),  // Display last IPS

                            TextEntry::make('kendala')
                                ->label('Kendala')
                                ->default($semester->kendala),  // Display kendala

                            TextEntry::make('kendala_lain')
                                ->label('Kendala Lain')
                                ->default($semester->kendala_lain ?: 'Tidak ada'),  // Default to "Tidak ada" if empty

                            TextEntry::make('matkul_disukai')
                                ->label('Matkul Disukai')
                                ->default($semester->matkul_disukai),  // Display favorite subjects

                            TextEntry::make('matkul_sulit')
                                ->label('Matkul Sulit')
                                ->default($semester->matkul_sulit),  // Display difficult subjects
                        ]);
                }

                return $sections;  // Return the sections array
            });
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(Student::query()->distinct('nisn'))
            ->columns([
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable()
                    ->default('Tidak Ada Data'),
                TextColumn::make('alumni.perguruan_tinggi')
                    ->label('Perguruan Tinggi')
                    ->sortable()
                    ->searchable()
                    ->default('Tidak Ada Data'),
                TextColumn::make('alumni.jurusan')
                    ->label('Jurusan')
                    ->sortable()
                    ->searchable()
                    ->default('Tidak Ada Data'),
                CircleProgress::make('progress')
                    ->label('Progress Semester')
                    ->getStateUsing(function ($record) {
                        $maxSemesters = 8; // Maksimal 8 semester
                        $filledSemesters = KinerjaSemester::where('nisn', $record->nisn)->count();
                        return [
                            'total' => $maxSemesters,
                            'progress' => $filledSemesters,
                        ];
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKinerjaSemesters::route('/'),
            'view' => Pages\ViewKinerjaSemester::route('/{record}'),
            'create' => Pages\CreateKinerjaSemester::route('/create'),
            'edit' => Pages\EditKinerjaSemester::route('/{record}/edit'),
        ];
    }
}
