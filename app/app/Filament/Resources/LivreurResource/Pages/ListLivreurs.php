<?php

namespace App\Filament\Resources\LivreurResource\Pages;

use App\Filament\Resources\LivreurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivreurs extends ListRecords
{
    protected static string $resource = LivreurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
