<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FlexiblePage;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FlexiblePageResource\Pages;
use App\Filament\Resources\FlexiblePageResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\CodeField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\SlugField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\IntroField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\TitleField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\AuthorField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Actions\ViewAction;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Columns\TitleColumn;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Actions\PublishAction;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\SEOFields;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Table\Columns\PublishedColumn;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\ContentBlocksField;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Groups\PublicationSection;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Actions\CopyContentBlocksToLocalesAction;

class FlexiblePageResource extends Resource
{
    use Translatable;
    
    protected static ?string $model = FlexiblePage::class;

    protected static ?string $navigationLabel = 'Pages';

    protected static ?string $slug = 'pages';

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Heading')
                    ->columnSpan(2)
                    ->tabs([
                        Tab::make('General')
                            ->schema([
                                TitleField::create(),
                                CodeField::create(),
                                SlugField::create(false),
                                IntroField::create(),
                                AuthorField::create(),
                                PublicationSection::create(),
                            ]),
                        Tab::make('Content')
                            ->schema([
                                CopyContentBlocksToLocalesAction::make('translate_blocks'),
                                ContentBlocksField::create(),
                            ]),
                        Tab::make('SEO')
                            ->schema([
                                SEOFields::create(1, true),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TitleColumn::create(),
                TextColumn::make('slug'),
                PublishedColumn::create(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                PublishAction::make(),
                Tables\Actions\DeleteAction::make(),
                // ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFlexiblePages::route('/'),
            'create' => Pages\CreateFlexiblePage::route('/create'),
            'edit' => Pages\EditFlexiblePage::route('/{record}/edit'),
        ];
    }    
}
