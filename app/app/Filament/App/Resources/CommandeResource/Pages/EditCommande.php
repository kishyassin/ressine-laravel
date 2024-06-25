<?php

namespace App\Filament\App\Resources\CommandeResource\Pages;

use App\Filament\App\Resources\CommandeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommande extends EditRecord
{
    protected static string $resource = CommandeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
