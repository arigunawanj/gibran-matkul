<?php

namespace App\Filament\Resources\SubcapaianResource\Pages;

use App\Filament\Resources\SubcapaianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubcapaian extends EditRecord
{
    protected static string $resource = SubcapaianResource::class;

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
