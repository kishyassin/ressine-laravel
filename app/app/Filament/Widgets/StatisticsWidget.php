<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Commande;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatisticsWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Amount',Commande::sum(\DB::raw('prixVente * quantite')))
            ->description('Le Montant total des factures')
            ->chart([
                1,3,5,2,6
            ])
            ->color('success'),

            Stat::make('Total des Client',Client::count())
                ->description('Le Nombre total des client')
                ->chart([
                    1,3,1,7,9
                ])
                ->color('info'),

            Stat::make('Total des Commande',Commande::count())
                ->description('Le Nombre total des Commande')
                ->chart([
                    1,2,1,1,9
                ])
                ->color('warning')
        ];
    }
}
