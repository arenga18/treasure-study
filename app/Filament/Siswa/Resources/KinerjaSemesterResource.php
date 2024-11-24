<?php

namespace App\Filament\Siswa\Resources;

use App\Filament\Siswa\Resources\KinerjaSemesterResource\Pages;
use App\Models\KinerjaSemester;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class KinerjaSemesterResource extends Resource
{
    protected static ?string $model = KinerjaSemester::class;

    protected static ?string $navigationGroup = 'Tracer Study';

    protected static ?string $navigationLabel = "Kinerja Semester";

    protected static ?string $pluralLabel = "Kinerja Semester";

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getNavigationBadge(): ?string
    {
        if (!auth()->check()) {
            return null;
        }

        $user = auth()->user();

        if (empty($user->nisn)) {
            return null;
        }

        return static::getModel()::where('nisn', $user->nisn)->count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('semester')
                    ->options([
                        1 => 'Semester 1',
                        2 => 'Semester 2',
                        3 => 'Semester 3',
                        4 => 'Semester 4',
                        5 => 'Semester 5',
                        6 => 'Semester 6',
                        7 => 'Semester 7',
                        8 => 'Semester 8',
                    ])->required(),
                TextInput::make('ips_terakhir')
                    ->label('Nilai IPS Terakhir')->required(),
                Section::make()
                    ->schema([
                        Select::make('kendala')
                            ->label('Kendala Selama Kuliah')
                            ->options([
                                'Dosen Pembimbing Sulit Dihubungi' => 'Dosen Pembimbing Sulit Dihubungi',
                                'lainnya' => 'lainnya'
                            ])
                            ->required()
                            ->reactive(),
                        TextInput::make('kendala_lain')
                            ->label('Kendala Lainnya')
                            ->visible(fn($get) => $get('kendala') === 'lainnya')
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        TextInput::make('matkul_disukai')
                            ->label('Mata Kuliah yang Disukai')->required(),
                        TextInput::make('matkul_sulit')
                            ->label('Mata Kuliah yang Sulit Dipahami')->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(KinerjaSemester::query()->where('nisn', auth()->user()->nisn))
            ->columns([
                TextColumn::make('semester')
                    ->label('Semester')
                    ->sortable(),
                TextColumn::make('ips_terakhir')
                    ->label('IPS Terahkhir')
                    ->sortable(),
                TextColumn::make('kendala')
                    ->label('Kendala Kuliah')
                    ->sortable(),
                TextColumn::make('kendala_lain')
                    ->label('Kendala Kuliah (Lainnya)')
                    ->sortable(),
                TextColumn::make('matkul_disukai')
                    ->label('Matkul Disukai')
                    ->sortable(),
                TextColumn::make('matkul_sulit')
                    ->label('Matkul Sulit')
                    ->sortable(),
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
            'index' => Pages\ListKinerjaSemesters::route('/'),
            'create' => Pages\CreateKinerjaSemester::route('/create'),
            'edit' => Pages\EditKinerjaSemester::route('/{record}/edit'),
        ];
    }
}
