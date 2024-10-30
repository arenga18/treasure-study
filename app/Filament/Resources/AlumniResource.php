<?php

namespace App\Filament\Resources;

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
                TextInput::make('nama_lengkap')->required(),
                TextInput::make('asal_kelas')->required(),
                FileUpload::make('foto')
                    ->required()
                    ->image()
                    ->imageEditor(),
                TextInput::make('diterima_pada')->required(),
                TextInput::make('jurusan')->required(),
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
                            ->label('Upload CSV')
                            ->acceptedFileTypes(['text/csv', 'application/vnd.ms-excel'])
                            ->required(),
                    ])
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
                TextColumn::make('nama_lengkap'),
                TextColumn::make('asal_kelas'),
                ImageColumn::make('foto'),
                TextColumn::make('diterima_pada'),
                TextColumn::make('jurusan'),
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
