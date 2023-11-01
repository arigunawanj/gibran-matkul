<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\CPMK;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\CPMKModel;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CPMKResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CPMKResource\RelationManagers;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class CPMKResource extends Resource
{
    protected static ?string $model = CPMKModel::class;
    protected static ?string $recordTitleAttribute = 'kode_cpmk';
    protected static ?string $navigationLabel = 'Kelola CPMK';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    // protected static ?string $modelLabel = 'CPMK';
    public static ?string $label = 'Daftar CPMK';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola CPMK')
                ->description('Digunakan sebagai Master CPMK')
                ->schema([
                    TextInput::make('kode_cpmk')
                        ->label('Kode CPMK'),
                    TextInput::make('deskripsi_cpmk')
                        ->label('Deskripsi CPMK'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_cpmk')
                    ->label('Kode CPMK'),
                TextColumn::make('deskripsi_cpmk')
                    ->label('Deskripsi CPMK'),
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
            'index' => Pages\ListCPMKS::route('/'),
            'create' => Pages\CreateCPMK::route('/create'),
            'edit' => Pages\EditCPMK::route('/{record}/edit'),
        ];
    }
}
