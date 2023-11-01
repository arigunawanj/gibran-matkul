<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Subcapaian;
use Filament\Tables\Table;
use App\Models\SubcapaianModel;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubcapaianResource\Pages;
use App\Filament\Resources\SubcapaianResource\RelationManagers;

class SubcapaianResource extends Resource
{
    protected static ?string $model = SubcapaianModel::class;
    protected static ?string $navigationLabel = 'Kelola Subcapaian';
    protected static ?string $navigationGroup = 'Koordinator Bidang';
    public static ?string $label = 'Kelola Subcapaian';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola Subcapaian')
                ->description('Digunakan sebagai Input Sub Capaian Pembelajaran Mata Kuliah (CPMK)')
                ->schema([
                    Select::make('kurikulum_id')
                        ->relationship(name: 'kurikulum', titleAttribute: 'nama_kurikulum')
                        ->label('Nama Kurikulum'),
                    Select::make('matkul_id')
                        ->relationship(name: 'matkul', titleAttribute: 'nama_matkul')
                        ->label('Nama Mata Kuliah'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kurikulum.nama_kurikulum')
                ->label('Nama Kurikulum'),
                TextColumn::make('matkul.nama_matkul')
                ->label('Nama Mata Kuliah'),
            ])
            ->poll('2s')
            ->filters([
                //
            ])
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
            'index' => Pages\ListSubcapaians::route('/'),
            'create' => Pages\CreateSubcapaian::route('/create'),
            'edit' => Pages\EditSubcapaian::route('/{record}/edit'),
        ];
    }
}
