<?php

namespace App\Filament\Resources\TestimonialeResource\Pages;

use App\Filament\Resources\TestimonialeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestimoniale extends EditRecord
{
    protected static string $resource = TestimonialeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
