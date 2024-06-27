<?php

namespace App\Filament\Livreur\Widgets;

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
            Stat::make('Factures servis par moi',Facture::where('idLivreur', Auth::guard('livreur')->id())->count())
                ->description('Les factures servis par moi')
                ->chart([
                    1,3,5,2,6
                ])
                ->color('success'),
            Stat::make('Commandes servis par moi',Facture::where('idLivreur', Auth::guard('livreur')->id())
                ->withCount('commandes')
                ->get()
                ->sum('commandes_count'))

                ->description('Les commande j ai servis')
                ->chart([
                    1,3,1,2,1
                ])
                ->color('info'),

            Stat::make('Factures en attente',Facture::where('idLivreur', NULL)->count())
                ->description('Les factures en attente')
                ->chart([
                    1,3,5,2,6
                ])
                ->color('danger'),
            Stat::make('Commandes en attente',Facture::where('idLivreur', NULL)
                ->withCount('commandes')
                ->get()
                ->sum('commandes_count'))

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
