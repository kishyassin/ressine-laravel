<?php

namespace App\Filament\Resources\PlatResource\Pages;

use App\Filament\Resources\PlatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlat extends EditRecord
{
    protected static string $resource = PlatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
