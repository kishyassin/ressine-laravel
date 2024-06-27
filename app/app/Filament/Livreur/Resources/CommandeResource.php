<?php

namespace App\Filament\Livreur\Resources;

use App\Filament\Livreur\Resources\CommandeResource\Pages;
use App\Filament\Livreur\Resources\CommandeResource\RelationManagers;
use App\Models\Commande;
use Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommandeResource extends Resource
{
    protected static ?string $model = Commande::class;
    protected static ?string$navigationLabel = 'Mes Commandes';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('Facture.adresseLivraison')
            ->columns([
                Tables\Columns\TextColumn::make('Plat.designationPlat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite')
                    ->numeric()
                    ->sortable(),
            ])
            ->modifyQueryUsing(function ($query){
                return $query->join('factures', 'commandes.numeroFacture', '=', 'factures.numeroFacture')
                    ->where('factures.idLivreur', Auth::guard('livreur')->id());
            });
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCommandes::route('/'),
            'create' => Pages\CreateCommande::route('/create'),
            'edit' => Pages\EditCommande::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
