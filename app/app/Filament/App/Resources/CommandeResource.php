<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Commande;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\CommandeResource\Pages;
use App\Filament\App\Resources\CommandeResource\RelationManagers;

class CommandeResource extends Resource
{
    protected static ?string $model = Commande::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('etat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('numeroFacture')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('idPlat')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('prixVente')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('quantite')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
           ->defaultGroup('Facture.created_at')
//            ->defaultSort('created_at','asc')
            ->columns([
                Tables\Columns\TextColumn::make('Plat.designationPlat'),
                Tables\Columns\TextColumn::make('prixVente')
                    ->money('MAD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite'),
                Tables\Columns\TextColumn::make('Facture.adresseLivraison')
                    ->wrap()
                    ->label('adresse'),
                Tables\Columns\TextColumn::make('etat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'en attente' => 'gray',
                        'en preparation' => 'warning',
                        'preparée' => 'info',
                        'en livraison' => 'success',
                        'livrée' => 'success',
                    }),
            ])

            ->modifyQueryUsing(function ($query) {
                return $query->whereHas('facture', function ($query) {
                    $query->where('idClient', Auth::id());
                })
                
                //    ->join('factures','factures.numeroFacture','=','commandes.numeroFacture')
                  //  ->orderBy('idDate', 'desc')
                ;
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
