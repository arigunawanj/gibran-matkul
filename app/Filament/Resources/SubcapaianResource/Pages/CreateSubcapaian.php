<?php

namespace App\Filament\Resources\SubcapaianResource\Pages;

use App\Filament\Resources\SubcapaianResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubcapaian extends CreateRecord
{
    protected static string $resource = SubcapaianResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
