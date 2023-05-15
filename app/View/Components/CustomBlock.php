<?php
namespace App\View\Components;

use Spatie\MediaLibrary\HasMedia;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Statikbe\FilamentFlexibleContentBlocks\FilamentFlexibleBlocksConfig;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBlockStyle;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasBackgroundColour;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BlockStyleField;
use Statikbe\FilamentFlexibleContentBlocks\FilamentFlexibleContentBlocksServiceProvider;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BackgroundColourField;

class CustomBlock extends AbstractContentBlock
{
    use HasBackgroundColour;
    use HasBlockStyle;

    public ?string $content;

    public ?string $title;


    /**
     * Create a new component instance.
     */
    public function __construct(HasContentBlocks&HasMedia $record, ?array $blockData)
    {
        parent::__construct($record, $blockData);

        $this->content = $blockData['content'] ?? null;
        $this->backgroundColourType = $blockData['background_colour'] ?? null;
        $this->title = $blockData['title'] ?? null;
        $this->setBlockStyle($blockData);
    }

    public static function getNameSuffix(): string
    {
        return 'text';
    }

    public static function getIcon(): string
    {
        return 'heroicon-o-view-list';
    }

    /**
     * {@inheritDoc}
     */
    protected static function makeFilamentSchema(): array|\Closure
    {
        return [
            TextInput::make('title')
                ->label(static::getFieldLabel('title')),
            RichEditor::make('content')
                ->label(static::getFieldLabel('label'))
                ->disableToolbarButtons([
                    'attachFiles',
                ])
                ->required(),
            Grid::make(2)->schema([
                BackgroundColourField::create(static::class),
                BlockStyleField::create(static::class),
            ]),
        ];
    }

    public function getSearchableContent(): array
    {
        $searchable = [];

        $this->addSearchableContent($searchable, $this->title);
        $this->addSearchableContent($searchable, $this->content);

        return $searchable;
    }


    public static function getName(): string
    {
        $nameSuffix = static::getNameSuffix();

        return sprintf('%s::%s', FilamentFlexibleContentBlocksServiceProvider::$name, $nameSuffix);
    }

    public static function getLabel(): string
    {
        $name = static::getNameSuffix();

        return "Custom block";
        // return trans("filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.{$name}.label");
    }

    public static function getFieldLabel(string $field): string
    {
        $name = static::getNameSuffix();

        return trans("filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.{$name}.{$field}");
    }

    public function render()
    {
        $themePrefix = FilamentFlexibleBlocksConfig::getViewThemePrefix();

        $templateSuffix = static::getNameSuffix();
        if (method_exists($this, 'getBlockStyleTemplateSuffix')) {
            $blockStyle = $this->getBlockStyleTemplateSuffix();
            if (! empty($blockStyle)) {
                $templateSuffix .= $blockStyle;
            }
        }

        return view("filament-flexible-content-blocks::content-blocks.{$themePrefix}{$templateSuffix}");
    }

}
