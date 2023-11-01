<?php

namespace App\Filament\Resources\CPMKNResource\Pages;

use App\Filament\Resources\CPMKNResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCPMKN extends CreateRecord
{
    protected static string $resource = CPMKNResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $kurikulum = $data['nama_kurikulum'];
        $cpl = $data['nama_cpl'];
        unset($kurikulum, $cpl);

        return $data;

    }

}
