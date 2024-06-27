<?php

namespace App\Filament\Livreur\Resources\CommandeResource\Pages;

use App\Filament\Livreur\Resources\CommandeResource;
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
