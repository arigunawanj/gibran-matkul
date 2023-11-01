<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\CPMKN;
use Filament\Forms\Form;
use App\Models\CPMKNModel;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CPMKNResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CPMKNResource\RelationManagers;
use Illuminate\Support\Str;
use App\Models\CPLModel;
use App\Models\KurikulumModel;

class CPMKNResource extends Resource
{
    protected static ?string $model = CPMKNModel::class;
    protected static ?string $navigationLabel = 'CPMK';
    protected static ?string $navigationGroup = 'Prodi';
    public static ?string $label = 'CPMK';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('CPMK')
                    ->description('Digunakan sebagai input CPMK')
                    ->schema([
                        Select::make('kurikulum_id')
                            ->relationship(name: 'kurikulum', titleAttribute: 'nama_kurikulum')
                            ->label('Pilih Kurikulum')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $harga = KurikulumModel::find($state);

                                if ($harga) {
                                    $set('nama_kurikulum', $harga->nama_kurikulum);
                                }
                            }),
                        TextInput::make('nama_kurikulum')
                            ->label('Nama Kurikulum'),
                        Select::make('m_cpl_id')
                            ->relationship(name: 'm_cpl', titleAttribute: 'kode_cpl')
                            ->label('Pilih CPL')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $harga = CPLModel::find($state);

                                if ($harga) {
                                    $set('nama_cpl', $harga->deskripsi_cpl);
                                }
                            }),
                        TextInput::make('nama_cpl')
                            ->label('Deskripsi CPL'),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('m_cpl.deskripsi_cpl')
                    ->label('Nama CPL'),
                TextColumn::make('kurikulum.nama_kurikulum')
                    ->label('Nama Kurikulum'),
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
            'index' => Pages\ListCPMKNS::route('/'),
            'create' => Pages\CreateCPMKN::route('/create'),
            'edit' => Pages\EditCPMKN::route('/{record}/edit'),
        ];
    }
}
