<?php

namespace App\Filament\Resources\LivreurResource\Pages;

use App\Filament\Resources\LivreurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivreur extends EditRecord
{
    protected static string $resource = LivreurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
