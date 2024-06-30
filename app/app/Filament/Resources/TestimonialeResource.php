<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialeResource\Pages;
use App\Filament\Resources\TestimonialeResource\RelationManagers;
use App\Models\Testimoniale;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Tables\Columns\TextColumn::make('jjmmaaaa')
                    ->date()
                    ->sortable(),  
                Tables\Columns\TextColumn::make('Client.name')
                    ->numeric()
                    ->sortable(),
               
                Tables\Columns\TextColumn::make('message')
                    ->searchable(),
                Tables\Columns\IconColumn::make('etatTestimoniale')
                    ->boolean(),
            Tables\Columns\SelectColumn::make('etatTestimoniale')
                ->options([
                    0 => 'en attente',
                    1 => 'accepter',
                ]),
                 
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
            ]);
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
    public static function canCreate(): bool
    {
        return 0;
    }
    public static function canEdit($record): bool
    {
        return 0;
    }
}
