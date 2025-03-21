<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisSeleksiResource\Pages;
use App\Filament\Resources\JenisSeleksiResource\RelationManagers;
use App\Models\JenisSeleksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisSeleksiResource extends Resource
{
    protected static ?string $modelLabel = 'Jenis Seleksi';

    protected static ?string $pluralLabel = 'Jenis Seleksi';
    protected static ?string $model = JenisSeleksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
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
            'index' => Pages\ListJenisSeleksis::route('/'),
            'create' => Pages\CreateJenisSeleksi::route('/create'),
            'edit' => Pages\EditJenisSeleksi::route('/{record}/edit'),
        ];
    }
}
