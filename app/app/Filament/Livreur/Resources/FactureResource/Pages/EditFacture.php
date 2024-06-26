<?php

namespace App\Filament\Livreur\Resources\FactureResource\Pages;

use App\Filament\Livreur\Resources\FactureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFacture extends EditRecord
{
    protected static string $resource = FactureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
