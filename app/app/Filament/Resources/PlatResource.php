<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatResource\Pages;
use App\Filament\Resources\PlatResource\RelationManagers;
use App\Filament\Resources\PlatResource\RelationManagers\ImagesRelationManager;
use App\Models\Categorie;
use App\Models\Plat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlatResource extends Resource
{
    protected static ?string $model = Plat::class;
    protected static ?string $navigationGroup = 'Restaurant';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('designationPlat')
                    ->maxLength(255),
                Forms\Components\Textarea::make('descriptionPlat')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('prixUnitaire')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('idCategorie') // Use Select component
                ->label('Categorie')
                    ->required()
                    ->relationship('categorie', 'designation') // Define relationship
                    ->options(Categorie::all()->pluck('designation', 'idCategorie')) // Fetch categories
                    ->searchable(),
                Forms\Components\FileUpload::make('imageSlide')->directory('uploads')
                    ->label('Upload Slide Image')
                    ->image()
                    ->multiple()
                    ->imageEditor()
                    ->imageResizeMode('force')
                    ->imageResizeTargetWidth('320')
                    ->imageResizeTargetHeight('480'),
                Forms\Components\FileUpload::make('imageHero')->directory('uploads')
                    ->label('Upload Hero Image')
                    ->image()
                    ->multiple()
                    ->imageEditor()
                    ->imageResizeMode('force')
                    ->imageResizeTargetWidth('1370')
                    ->imageResizeTargetHeight('770'),
                Forms\Components\FileUpload::make('imageIcon')->directory('uploads')
                    ->label('Upload Icon Image')
                    ->image()
                    ->multiple()
                    ->imageEditor()
                    ->imageResizeMode('force')
                    ->imageResizeTargetWidth('200')
                    ->imageResizeTargetHeight('200'),
            ]);
    }

        public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('Categorie.designation')
        ->columns([
                Tables\Columns\ImageColumn::make('imageIcon'),
                Tables\Columns\TextColumn::make('designationPlat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descriptionPlat')
                    ->wrap(),
                Tables\Columns\TextColumn::make('prixUnitaire')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Categorie.designation')
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
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlats::route('/'),
            'create' => Pages\CreatePlat::route('/create'),
            'edit' => Pages\EditPlat::route('/{record}/edit'),
        ];
    }
}
