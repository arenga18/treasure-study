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
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\ImportAction;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $slug = 'alumni';

    protected static ?string $navigationLabel = 'Alumni';

    protected static ?string $modelLabel = 'Alumni';

    protected static ?string $pluralLabel = 'Alumni';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nisn')->required(),
                TextInput::make('nama_siswa')->required(),
                TextInput::make('kelas')->required(),
                FileUpload::make('foto')
                    ->image()
                    ->imageEditor(),
                TextInput::make('perguruan_tinggi')->required(),
                TextInput::make('jurusan')->required(),
                TextInput::make('tahun_lulus')
                    ->numeric()
                    ->required(),
                TextInput::make('sistem_seleksi')
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

                TextColumn::make('nisn'),
                TextColumn::make('nama_siswa'),
                TextColumn::make('kelas'),
                ImageColumn::make('foto'),
                TextColumn::make('perguruan_tinggi'),
                TextColumn::make('jurusan'),
                TextColumn::make('tahun_lulus'),
                TextColumn::make('sistem_seleksi'),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}
