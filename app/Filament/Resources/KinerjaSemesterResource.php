<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KinerjaSemesterResource\Pages;
use App\Filament\Resources\KinerjaSemesterResource\RelationManagers;
use App\Models\KinerjaSemester;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KinerjaSemesterResource extends Resource
{
    protected static ?string $model = KinerjaSemester::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
