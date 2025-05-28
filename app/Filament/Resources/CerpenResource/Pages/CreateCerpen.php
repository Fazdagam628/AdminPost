<?php

namespace App\Filament\Resources\CerpenResource\Pages;

use App\Filament\Resources\CerpenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCerpen extends CreateRecord
{
    protected static string $resource = CerpenResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}