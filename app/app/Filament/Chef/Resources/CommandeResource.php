<?php

namespace App\Filament\Chef\Resources;

use App\Filament\Chef\Resources\CommandeResource\Pages;
use App\Filament\Chef\Resources\CommandeResource\RelationManagers;
use App\Models\Commande;
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
            ->columns([
                Tables\Columns\TextColumn::make('Plat.designationPlat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Plat.descriptionPlat')
                    ->wrap(),
                Tables\Columns\TextColumn::make('quantite')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\SelectColumn::make('etat')
                    ->options([
                        'en attente' => 'en attente',
                        'en preparation' => 'en preparation',
                        'preparée' => 'preparée',
                       // 'en livraison' => 'en livraison'
                        // 'livrée' => 'livrée',
                    ]),

            ])->modifyQueryUsing(function ($query){
                return $query->whereIn('etat',['en preparation', 'en attente']);
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
        return 0;
    }
    public static function canEdit($record): bool
    {
        return 0;
    }
}
