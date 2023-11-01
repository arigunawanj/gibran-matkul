<?php

namespace App\Filament\Resources\CPMKNResource\Pages;

use App\Filament\Resources\CPMKNResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCPMKNS extends ListRecords
{
    protected static string $resource = CPMKNResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
