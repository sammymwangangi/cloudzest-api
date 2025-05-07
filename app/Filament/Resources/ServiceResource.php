<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(fn (string $state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('meta_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('seo_keywords')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hero_heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('hero_subheading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hero_cta_button_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hero_cta_button_link')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('hero_image_url')
                    ->image()
                    ->directory('images/services')
                    ->visibility('public')
                    ->required(),
                Forms\Components\TextInput::make('introduction_heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('introduction_content')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('testimonial_or_quote')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('testimonial_author')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('published')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('meta_title'),
                Tables\Columns\ImageColumn::make('hero_heading'),
                Tables\Columns\IconColumn::make('published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
            RelationManagers\FeaturesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
