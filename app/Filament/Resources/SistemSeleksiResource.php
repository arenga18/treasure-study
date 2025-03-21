<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SistemSeleksiResource\Pages;
use App\Filament\Resources\SistemSeleksiResource\RelationManagers;
use App\Models\SistemSeleksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SistemSeleksiResource extends Resource
{
    protected static ?string $modelLabel = 'Sistem Seleksi';

    protected static ?string $pluralLabel = 'Sistem Seleksi';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Sistem Seleksi';

    protected static ?string $model = SistemSeleksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jenis_seleksi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenis_seleksi')->searchable(),
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
            'index' => Pages\ListSistemSeleksis::route('/'),
            'create' => Pages\CreateSistemSeleksi::route('/create'),
            'edit' => Pages\EditSistemSeleksi::route('/{record}/edit'),
        ];
    }
}
