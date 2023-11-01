<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CPLResource\Pages;
use App\Filament\Resources\CPLResource\RelationManagers;
use App\Models\CPL;
use App\Models\CPLModel;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CPLResource extends Resource
{
    protected static ?string $model = CPLModel::class;
    protected static ?string $recordTitleAttribute = 'kode_cpl';
    protected static ?string $navigationLabel = 'Kelola CPL';
    protected static ?string $navigationGroup = 'Master';
    // protected static ?string $modelLabel = 'CPL';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    public static ?string $label = 'Kelola CPL';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola CPL')
                    ->description('Digunakan sebagai Master CPL')
                    ->schema([
                        TextInput::make('kode_cpl')
                            ->label('Kode CPL'),
                        TextInput::make('deskripsi_cpl')
                            ->label('Deskripsi CPL'),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_cpl')
                    ->label('Kode CPL'),
                TextColumn::make('deskripsi_cpl')
                    ->label('Deskripsi CPL'),
            ])
            ->filters([
                //
            ])
            ->poll('2s')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListCPLS::route('/'),
            'create' => Pages\CreateCPL::route('/create'),
            'edit' => Pages\EditCPL::route('/{record}/edit'),
        ];
    }
}
