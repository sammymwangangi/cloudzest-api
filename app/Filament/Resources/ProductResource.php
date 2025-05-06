<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

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
                    ->directory('images/products')
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
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('hero_image_url')
                    ->circular(),
                Tables\Columns\IconColumn::make('published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
