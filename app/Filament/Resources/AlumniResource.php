<?php

namespace App\Filament\Resources;

use App\Exports\AlumniExport;
use App\Exports\AlumniSelectedExport;
use App\Filament\Resources\AlumniResource\Pages;
use App\Models\Alumni;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Imports\AlumniImport;
use App\Models\JenisSeleksi;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\PerguruanTinggi;
use App\Models\SistemSeleksi;
use App\Models\TahunLulus;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $slug = 'alumni';

    protected static ?string $navigationGroup = 'Alumni';

    protected static ?string $navigationLabel = 'Alumni';

    protected static ?string $modelLabel = 'Alumni';

    protected static ?string $pluralLabel = 'Alumni';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nisn')
                    ->label('NISN')
                    ->required(),

                TextInput::make('nama_siswa')
                    ->required(),

                Select::make('kelas')
                    ->options(Kelas::all()->pluck('nama', 'nama'))
                    ->required(),

                FileUpload::make('foto')
                    ->image()
                    ->imageEditor(),

                Select::make('perguruan_tinggi')
                    ->options(PerguruanTinggi::all()->pluck('nama', 'nama'))
                    ->required()
                    ->reactive(),

                Select::make('jurusan')
                    ->options(fn($get) => $get('perguruan_tinggi')
                        ? Jurusan::where('perguruan_tinggi', $get('perguruan_tinggi'))->pluck('nama', 'nama')
                        : [])
                    ->required()
                    ->reactive(),

                Select::make('tahun_lulus')
                    ->options(TahunLulus::all()->pluck('tahun', 'tahun'))
                    ->required(),

                Section::make()
                    ->schema([
                        Select::make('sistem_seleksi')
                            ->label('Sistem Seleksi')
                            ->options(options: SistemSeleksi::all()
                                ->pluck('jenis_seleksi', 'jenis_seleksi'))
                            ->required()
                            ->reactive(),
                        Select::make('jenis_seleksi')
                            ->label('Jenis Seleksi')
                            ->options(fn($get) => $get('perguruan_tinggi')
                                ? JenisSeleksi::where('perguruan_tinggi', $get('perguruan_tinggi'))->pluck('nama', 'nama')
                                : [])
                            ->visible(fn($get) => $get('sistem_seleksi') === 'MANDIRI')
                            ->required(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Action::make('import')
                    ->label('Import Alumni')
                    ->action(function (array $data) {
                        // Menggunakan Excel facade untuk menjalankan import
                        Excel::import(new AlumniImport, storage_path('app/public/' . $data['file']));

                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Upload CSV / XLSX')
                            ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                            ->required(),
                    ])
                    ->icon("heroicon-o-document-arrow-down"),
                Action::make('export')
                    ->label("Export to Excel")
                    ->icon("heroicon-o-document-arrow-down")
                    ->action(function () {
                        return Excel::download(new AlumniExport, 'alumni.xlsx');
                    })
            ])
            ->columns([
                TextColumn::make('row_number')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        $currentPage = request()->input('page', 1);
                        $perPage = 10;
                        return (($currentPage - 1) * $perPage) + ($rowLoop->index + 1);
                    }),
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable(),
                TextColumn::make('nama_siswa')->searchable(),
                TextColumn::make('kelas')->searchable(),
                ImageColumn::make('foto')
                    ->searchable()
                    ->width(60)
                    ->height(60),
                TextColumn::make('perguruan_tinggi')->searchable(),
                TextColumn::make('jurusan')->searchable(),
                TextColumn::make('tahun_lulus')->searchable(),
                TextColumn::make('sistem_seleksi')->searchable(),
                TextColumn::make('jenis_seleksi')->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('export')
                        ->label("Export to Excel")
                        ->icon("heroicon-o-document-arrow-down")
                        ->action(function ($records) {
                            return Excel::download(new AlumniSelectedExport($records), 'alumni.xlsx');
                        })
                ]),
            ])
            ->searchable();
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
