<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageResource\Pages;
use App\Models\Homepage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class HomepageResource extends Resource
{
    protected static ?string $model = Homepage::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('SEO Information')
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
                            ->nullable()
                            ->maxLength(255),
                    ]),
                
                Forms\Components\Section::make('Hero Section')
                    ->schema([
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
                            ->directory('images/homepage')
                            ->visibility('public')
                            ->required(),
                    ]),
                
                Forms\Components\Section::make('Featured Services Section')
                    ->schema([
                        Forms\Components\TextInput::make('featured_services_heading')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('featured_services_subheading')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Forms\Components\Section::make('Testimonial Section')
                    ->schema([
                        Forms\Components\TextInput::make('testimonial_heading')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('testimonial_content')
                            ->required()
                            ->maxLength(1000),
                        Forms\Components\TextInput::make('testimonial_author')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('testimonial_author_title')
                            ->required()
                            ->maxLength(255),
                    ]),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepages::route('/'),
            'create' => Pages\CreateHomepage::route('/create'),
            'edit' => Pages\EditHomepage::route('/{record}/edit'),
        ];
    }
}
