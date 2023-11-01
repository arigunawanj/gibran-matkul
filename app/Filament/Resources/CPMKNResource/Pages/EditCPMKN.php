<?php

namespace App\Filament\Resources\CPMKNResource\Pages;

use App\Filament\Resources\CPMKNResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCPMKN extends EditRecord
{
    protected static string $resource = CPMKNResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
