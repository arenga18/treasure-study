<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TahunLulusResource\Pages;
use App\Filament\Resources\TahunLulusResource\RelationManagers;
use App\Models\TahunLulus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahunLulusResource extends Resource
{
    protected static ?string $modelLabel = 'Tahun Lulus';

    protected static ?string $pluralLabel = 'Tahun Lulus';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Tahun Lulus';

    protected static ?string $model = TahunLulus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')->searchable(),
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
            'index' => Pages\ListTahunLuluses::route('/'),
            'create' => Pages\CreateTahunLulus::route('/create'),
            'edit' => Pages\EditTahunLulus::route('/{record}/edit'),
        ];
    }
}
