<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KurikulumResource\Pages;
use App\Filament\Resources\KurikulumResource\RelationManagers;
use App\Models\Kurikulum;
use App\Models\KurikulumModel;
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

class KurikulumResource extends Resource
{
    protected static ?string $model = KurikulumModel::class;
    protected static ?string $navigationLabel = 'Kelola Kurikulum';
    protected static ?string $navigationGroup = 'Prodi';
    public static ?string $label = 'Kelola Kurikulum';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tambah Kurikulum')
                    ->description('Ini digunakan untuk menambahkan Kurikulum')
                    ->schema([

                        TextInput::make('kode_kurikulum')
                            ->label('Kode Kurikulum'),
                        TextInput::make('nama_kurikulum')
                            ->label('Nama Kurikulum'),
                        TextInput::make('periode')
                            ->label('Periode')
                            ->numeric(),
                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric(),
                        TextInput::make('profil')
                            ->label('Profil'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_kurikulum')
                    ->label('Kode Kurikulum'),
                TextColumn::make('nama_kurikulum')
                    ->label('Nama Kurikulum'),
                TextColumn::make('periode')
                    ->label('Periode'),
                TextColumn::make('tahun')
                    ->label('Tahun'),
                TextColumn::make('profil')
                    ->label('Profil'),
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
            'index' => Pages\ListKurikulums::route('/'),
            'create' => Pages\CreateKurikulum::route('/create'),
            'edit' => Pages\EditKurikulum::route('/{record}/edit'),
        ];
    }
}
