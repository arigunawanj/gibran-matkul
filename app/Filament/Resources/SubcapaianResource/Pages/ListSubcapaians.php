<?php

namespace App\Filament\Resources\SubcapaianResource\Pages;

use App\Filament\Resources\SubcapaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubcapaians extends ListRecords
{
    protected static string $resource = SubcapaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
