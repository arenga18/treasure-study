<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerguruanTinggiResource\Pages;
use App\Filament\Resources\PerguruanTinggiResource\RelationManagers;
use App\Models\PerguruanTinggi;
use App\Models\KategoriPerguruanTinggi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerguruanTinggiResource extends Resource
{

    protected static ?string $modelLabel = 'Perguruan Tinggi';

    protected static ?string $pluralLabel = 'Perguruan Tinggi';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Perguruan Tinggi';

    protected static ?string $model = PerguruanTinggi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kategori_pt')
                    ->label("Kategori Perguruan Tinggi")
                    ->options(fn() => KategoriPerguruanTinggi::pluck('nama', 'nama')),
                TextInput::make('nama')
                    ->label("Nama Perguruan Tinggi")
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori_pt')->searchable(),
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
            'index' => Pages\ListPerguruanTinggis::route('/'),
            'create' => Pages\CreatePerguruanTinggi::route('/create'),
            'edit' => Pages\EditPerguruanTinggi::route('/{record}/edit'),
        ];
    }
}
