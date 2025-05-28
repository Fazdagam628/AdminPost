<?php

namespace App\Filament\Resources\CerpenResource\Pages;

use App\Filament\Resources\CerpenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCerpen extends EditRecord
{
    protected static string $resource = CerpenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
