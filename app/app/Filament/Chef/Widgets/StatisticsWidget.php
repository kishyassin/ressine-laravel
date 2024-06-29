<?php

namespace App\Filament\Chef\Widgets;

use App\Models\Commande;
use Auth;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatisticsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $chefId = Auth::guard('chef')->id();

        return [
            Stat::make('Commandes servis',Commande::where('etat','preparée')->count() )
                ->description('e nombre totale des commandes servis')
                ->chart([
                    1, 3, 1, 1 // Example chart data
                ])
                ->color('info'),

            Stat::make('Commandes préparées par moi', function () use ($chefId) {
                return Commande::where('idChef', $chefId)->count();
            })
                ->description('Les commandes que j\'ai servies')
                ->chart([
                    1, 3, 4, 2, 1 // Example chart data
                ])
                ->color('success'),

            Stat::make('Commandes en attente', function () {
                return Commande::where('etat', 'en attente')->count();
            })
                ->description('Les commandes en attente')
                ->chart([
                    1, 3, 1, 2, 1 // Example chart data
                ])
                ->color('danger')
        ];
    }

    public function getColumns(): int
    {
        return 3;
    }
}
