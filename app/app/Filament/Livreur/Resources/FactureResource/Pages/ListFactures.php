<?php

namespace App\Filament\Livreur\Resources\FactureResource\Pages;

use App\Filament\Livreur\Resources\FactureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFactures extends ListRecords
{
    protected static string $resource = FactureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
