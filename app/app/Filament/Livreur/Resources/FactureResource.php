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
                Forms\Components\TextInput::make('etat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('adresseLivraison')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Date.jjmmaaaa')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('idLivreur')
                    ->numeric(),
                Forms\Components\TextInput::make('idClient')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('etat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('adresseLivraison')
                    ->searchable(),
                Tables\Columns\TextColumn::make('idDate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('idLivreur')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('idClient')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function ($query) {
                return $query->whereHas('commandes', function ($query) {
                    $query->where('etat', 'preparée');
                });
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
            'index' => Pages\ListFactures::route('/'),
            'create' => Pages\CreateFacture::route('/create'),
            'edit' => Pages\EditFacture::route('/{record}/edit'),
        ];
    }
}
