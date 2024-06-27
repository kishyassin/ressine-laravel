<?php

namespace App\Filament\Livreur\Resources\FactureResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommandesRelationManager extends RelationManager
{
    protected static string $relationship = 'commandes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idCommande')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Plat.designationPlat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prixVente')
                    ->money('MAD')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantite')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Facture.adresseLivraison')
                    ->wrap()
                    ->label('adresse'),
                Tables\Columns\TextColumn::make('etat')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'en attente' => 'gray',
                        'en preparation' => 'warning',
                        'preparée' => 'info',
                        'en livraison' => 'success',
                        'livrée' => 'success',
                    }),
            ]);
    }

}
