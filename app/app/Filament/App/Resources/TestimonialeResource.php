<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Testimoniale;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\TestimonialeResource\Pages;
use App\Filament\App\Resources\TestimonialeResource\RelationManagers;

class TestimonialeResource extends Resource
{
    protected static ?string $model = Testimoniale::class;

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
            ->columns([
                Tables\Columns\TextColumn::make('message')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jjmmaaaa')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('etatTestimoniale')
                    ->boolean(),
            ])

            ->filters([
                //
            ])
            ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function ($query) {
                return $query->where('idClient', Auth::id())
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
            'index' => Pages\ListTestimoniales::route('/'),
            'create' => Pages\CreateTestimoniale::route('/create'),
            'edit' => Pages\EditTestimoniale::route('/{record}/edit'),
        ];
    }
    public static function canAdd($record): bool
    {
        return 0;
    }
}
