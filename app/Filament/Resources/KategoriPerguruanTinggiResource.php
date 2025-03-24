<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriPerguruanTinggiResource\Pages;
use App\Filament\Resources\KategoriPerguruanTinggiResource\RelationManagers;
use App\Models\KategoriPerguruanTinggi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriPerguruanTinggiResource extends Resource
{
    protected static ?string $modelLabel = 'Kategori Perguruan Tinggi';

    protected static ?string $pluralLabel = 'Kategori Perguruan Tinggi';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Kategori Perguruan Tinggi';

    protected static ?string $model = KategoriPerguruanTinggi::class;

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
            ->defaultSort('updated_at', 'desc')
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
            'index' => Pages\ListKategoriPerguruanTinggis::route('/'),
            'create' => Pages\CreateKategoriPerguruanTinggi::route('/create'),
            'edit' => Pages\EditKategoriPerguruanTinggi::route('/{record}/edit'),
        ];
    }
}
