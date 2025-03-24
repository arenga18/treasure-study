<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KinerjaSemesterResource\Pages;
use App\Models\KinerjaSemester;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
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

    protected static ?string $navigationGroup = 'Alumni';

    protected static ?string $navigationLabel = "Kinerja Semester";
    protected static ?string $pluralLabel = "Kinerja Semester Siswa";

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
        // Mendapatkan record infolist dan nisn
        $record = $infolist->getRecord();
        $nisn = $record->nisn;

        // Mendapatkan data dari tabel student berdasarkan nisn
        $student = Student::where('nisn', $nisn)->first();

        if (!$student) {
            return $infolist;
        }

        $alumni = $student->alumni;

        // Pastikan $alumni ada sebelum melanjutkan
        if (!$alumni) {
            $alumni = (object)[
                'kelas' => 'Tidak ada',
                'perguruan_tinggi' => 'Tidak ada data',
                'jurusan' => 'Tidak ada data',
            ];
        }

        $semesters = KinerjaSemester::where('nisn', $nisn)->orderBy('semester', 'asc')->get();

        return $infolist
            ->schema(function () use ($student, $semesters, $alumni) {
                $sections = [];

                // Data Siswa
                $sections[] = Section::make('Data Siswa')
                    ->schema([
                        TextEntry::make('nisn')
                            ->label('NISN')
                            ->columnStart(1)
                            ->default($student->nisn ?? 'Tidak ada'),
                        TextEntry::make('name')
                            ->label('Nama')
                            ->columnStart(2)
                            ->default($student->name ?? 'Tidak ada'),
                        TextEntry::make('email')
                            ->label('Email')
                            ->default($student->email ?? 'Tidak ada'),
                        TextEntry::make('kelas')
                            ->label('Asal Kelas')
                            ->default($alumni->kelas ?? 'Tidak ada'),
                        TextEntry::make('perguruan_tinggi')
                            ->label('Perguruan Tinggi')
                            ->default($alumni->perguruan_tinggi ?? 'Tidak ada data'),
                        TextEntry::make('jurusan')
                            ->label('Jurusan')
                            ->default($alumni->jurusan ?? 'Tidak ada data'),
                    ])
                    ->columns([
                        'sm' => 2,
                        'xl' => 3,
                    ]);

                // looping untuk setiap semester
                foreach ($semesters as $semester) {
                    $sections[] = Section::make('Semester ' . $semester->semester)
                        ->schema([
                            TextEntry::make('ips_terakhir_' . $semester->semester)
                                ->label('IPS Terakhir')
                                ->default($semester->ips_terakhir ?? 'Tidak ada'),
                            TextEntry::make('kendala_' . $semester->semester)
                                ->label('Kendala')
                                ->default($semester->kendala ?? 'Tidak ada'),
                            TextEntry::make('kendala_lain_' . $semester->semester)
                                ->label('Kendala Lain')
                                ->default($semester->kendala_lain ?? 'Tidak ada'),
                            TextEntry::make('matkul_disukai_' . $semester->semester)
                                ->label('Matkul Disukai')
                                ->default($semester->matkul_disukai ?? 'Tidak ada'),
                            TextEntry::make('matkul_sulit_' . $semester->semester)
                                ->label('Matkul Sulit')
                                ->default($semester->matkul_sulit ?? 'Tidak ada'),
                        ])->collapsed();
                }

                return $sections;
            });
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Student::query()
                    ->with('kinerjaSemester')
                    ->whereHas('kinerjaSemester')
                    ->distinct('nisn')
            )
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

                        // Pastikan nilai yang diterima adalah angka
                        $filledSemesters = is_numeric($filledSemesters) ? (int) $filledSemesters : 0;

                        // Mengembalikan nilai progress dalam format x/8
                        return [
                            'total' => $maxSemesters,
                            'progress' => $filledSemesters
                        ];
                    })
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn(Student $record): string => $record->kinerjaSemester
                        ? route('kinerja-semesters.view', ['record' => $record->kinerjaSemester])
                        : '#')
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
