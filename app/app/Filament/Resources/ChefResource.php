<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChefResource\Pages;
use App\Filament\Resources\ChefResource\RelationManagers;
use App\Models\Chef;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChefResource extends Resource
{
    protected static ?string $model = Chef::class;
    protected static ?string $navigationGroup = 'Personnes';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form

            ->columns([
                'sm' => 1,
                'xl' => 3,
            ])
            ->schema([
                Forms\Components\Section::make('information personelles')
                    ->schema([
                        Forms\Components\TextInput::make('nomChef')
                            ->required()
                            ->maxLength(255)
                            ->label('nom'),
                        Forms\Components\TextInput::make('prenomChef')
                            ->required()
                            ->maxLength(255)
                            ->label('prenom'),
                        Forms\Components\TextInput::make('fonction')
                            ->maxLength(255),
                    ])
                    ->columns([
                        'sm' => 1,
                        'xl' => 3,
                    ]),
                Forms\Components\Section::make('sociale media')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('twitter')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->maxLength(255),
                    ])
                    ->columns([
                        'sm' => 1,
                        'xl' => 3,
                    ]),
                Forms\Components\Section::make('profile')
                    ->schema([
                        Forms\Components\FileUpload::make('imageChef')->directory('uploads')
                            ->label('Upload Chef Image'),
                    ])
                    ->columns([
                        'sm' => 1,

                    ]),


            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomChef')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prenomChef')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imageChef')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fonction')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
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
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListChefs::route('/'),
            'create' => Pages\CreateChef::route('/create'),
            'edit' => Pages\EditChef::route('/{record}/edit'),
        ];
    }
}
