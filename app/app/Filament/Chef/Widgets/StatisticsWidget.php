<?php

namespace App\Filament\Chef\Widgets;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Facture;
use Auth;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatisticsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {

        return [

            Stat::make('Commandes preparer par moi',Commande::where('idChef', Auth::guard('chef')->id())
                ->withCount('commandes')
                ->get()
                ->sum('commandes_count'))

                ->description('Les commande j ai servis')
                ->chart([
                    1,3,1,2,1
                ])
                ->color('success'),

            Stat::make('Commandes en attente',Commande::where('etat','en attente'))

                ->description('Les commande en attente')
                ->chart([
                    1,3,1,2,1
                ])
                ->color('danger')

        ];
    }
    public function getColumns(): int
    {
        return 2;
    }
}
