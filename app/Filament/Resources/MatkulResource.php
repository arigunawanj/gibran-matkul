<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Matkul;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MatkulModel;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MatkulResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MatkulResource\RelationManagers;

class MatkulResource extends Resource
{
    protected static ?string $model = MatkulModel::class;
    protected static ?string $navigationLabel = 'Kelola Mata kuliah';
    protected static ?string $navigationGroup = 'Prodi';
    public static ?string $label = 'Kelola Mata Kuliah';
    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kelola Matkul')
                    ->description('Digunakan sebagai Input Mata Kuliah')
                    ->schema([
                        Select::make('kurikulum_id')
                            ->relationship(name: 'kurikulum', titleAttribute: 'nama_kurikulum')
                            ->label('Nama Kurikulum'),
                        TextInput::make('kode_matkul')
                            ->label('Kode Mata Kuliah'),
                        TextInput::make('nama_matkul')
                            ->label('Nama Mata Kuliah'),
                        TextInput::make('deskripsi_matkul')
                            ->label('Deskripsi Mata Kuliah'),
                        TextInput::make('semester')
                            ->label('Semester'),
                        TextInput::make('sks')
                            ->label('SKS'),
                        TextInput::make('kajian')
                            ->label('Kajian'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kurikulum.nama_kurikulum')
                    ->label('Nama Kurikulum'),
                TextColumn::make('kode_matkul')
                    ->label('Kode Mata Kuliah'),
                TextColumn::make('nama_matkul')
                    ->label('Nama Mata Kuliah'),
                TextColumn::make('deskripsi_matkul')
                    ->label('Deskripsi Mata Kuliah'),
                TextColumn::make('semester')
                    ->label('Semester'),
                TextColumn::make('sks')
                    ->label('SKS'),
                TextColumn::make('kajian')
                    ->label('Kajian'),
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
            'index' => Pages\ListMatkuls::route('/'),
            'create' => Pages\CreateMatkul::route('/create'),
            'edit' => Pages\EditMatkul::route('/{record}/edit'),
        ];
    }
}
