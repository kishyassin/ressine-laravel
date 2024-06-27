<?php

namespace App\Filament\Widgets;

use App\Models\Facture;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class FactureChart extends ChartWidget
{
    protected static ?string $heading = 'Factures Du Semaine';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = Trend::model(Facture::class)
        ->between(
            start: now()->startOfWeek(),
            end: now()->endOfWeek(),
        )
        ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Factures',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
            'fill' => 'rgb(255, 0, 0)'
        ];

    }

    protected function getType(): string
    {
        return 'line';
    }
}
