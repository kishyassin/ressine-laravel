<?php

namespace App\Filament\Resources\PlatResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('imageSlide')->directory('uploads')
                    ->label('Upload Slide Image'),
                Forms\Components\FileUpload::make('imageHero')->directory('uploads')
                    ->label('Upload Hero Image'),
                Forms\Components\FileUpload::make('imageIcon')->directory('uploads')
                    ->label('Upload Icon Image'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\ImageColumn::make('imageSlide'),
                Tables\Columns\ImageColumn::make('imageHero'),
                Tables\Columns\ImageColumn::make('imageIcon'),
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
}
