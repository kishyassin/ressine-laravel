<?php

namespace App\Filament\Livreur\Resources;

use App\Filament\Livreur\Resources\FactureResource\Pages;
use App\Filament\Livreur\Resources\FactureResource\RelationManagers;
use App\Models\Facture;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FactureResource extends Resource
{
    protected static ?string $model = Facture::class;
    protected static ?string$navigationLabel = 'Facture en attente';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('etat')
                    ->options([
                        'en attente' => 'en attente',
                       // 'en preparation' => 'en preparation',
                       // 'preparée' => 'preparée',
                         'en livraison' => 'en livraison',
                         'livrée' => 'livrée',
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('OrderDate.jjmmaaaa'),
                Tables\Columns\TextColumn::make('adresseLivraison')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Client.name'),
                Tables\Columns\TextColumn::make('Client.telephone')
                ->label('phone'),
                Tables\Columns\IconColumn::make('reglee')
                ->label('Payée')
                ->boolean(),
                Tables\Columns\SelectColumn::make('etat')
                    ->options([
                        'en attente' => 'en attente',
                         'en livraison' => 'en livraison',
                         'livrée' => 'livrée',
                    ]),
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->modifyQueryUsing(function ($query) {
                return $query->whereDoesntHave('commandes', function ($query) {
                    $query->whereIn('etat', ['en attente', 'livrée']);
                });
            });

    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CommandesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactures::route('/'),
            'create' => Pages\CreateFacture::route('/create'),
            'edit' => Pages\EditFacture::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
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
