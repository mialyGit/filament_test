<?php

// config for Statikbe/FilamentFlexibleContentBlocks

use Spatie\Image\Manipulations;
use App\View\Components\CustomBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\HtmlBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TextBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\CardsBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\ImageBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\QuoteBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\VideoBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\OverviewBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TemplateBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\TextImageBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\CallToActionBlock;

return [
    /*
    |--------------------------------------------------------------------------
    | Application Supported Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the possible locales that can be used.
    | You are free to fill this array with any of the locales which will be
    | supported by the application.
    |
    */
    'supported_locales' => [
        'nl',
        'en',
    ],

    'default_flexible_blocks' => [
        TextBlock::class,
        VideoBlock::class,
        ImageBlock::class,
        HtmlBlock::class,
        TextImageBlock::class,
        // OverviewBlock::class,
        // QuoteBlock::class,
        CallToActionBlock::class,
        CardsBlock::class,
        TemplateBlock::class,
        // CustomBlock::class
    ],

    /*
     |--------------------------------------------------------------------------
     | Theme
     |--------------------------------------------------------------------------
     |
     | It is possible to create different themes for the views of the blocks and their components.
     | Creating a new theme is done by publishing the views (see README.md) and then renaming the `tailwind` directory
     | to your theme name, e.g. `bootstrap`. You should then specify in the var below the name of your new theme.
     */
    'theme' => 'tailwind',

    'image_conversions' => [
        'models' => [
            'default' => [
                'seo_image' => [
                    'seo_image' => [
                        'fit' => Manipulations::FIT_CROP,
                        'width' => 1200,
                        'height' => 630,
                        'responsive' => true,
                    ],
                ],
                'overview_image' => [
                    'overview_image' => [
                        'fit' => Manipulations::FIT_CROP,
                        'width' => 500,
                        'height' => 500,
                        'responsive' => true,
                    ],
                ],
                'hero_image' => [
                    'hero_image' => [
                        'fit' => Manipulations::FIT_CROP,
                        'width' => 1200,
                        'height' => 630,
                        'responsive' => true,
                    ],
                    'extra_conversions' => [
                        'hero_image_square' => [
                            'fit' => Manipulations::FIT_CROP,
                            'width' => 400,
                            'height' => 400,
                            'responsive' => true,
                        ],
                    ],
                ],
            ],
            'specific' => [
                /*Page::class => [
                    'overview_image' => [
                        'thumb' => [
                            'fit' => Manipulations::FIT_CROP,
                            'width' => 400,
                            'height' => 400,
                            'responsive' => true,
                        ],
                    ],
                ],*/
            ],
        ],
        'flexible_blocks' => [
            'default' => [],
            'specific' => [],
        ],
    ],

    'overview_models' => [
        'App\Models\FlexiblePage',
    ],

    'call_to_action_models' => [
        'App\Models\FlexiblePage',
    ],

    'link_routes' => [
        'allowed' => [
            '*',
        ],
        'denied' => [
            'debugbar*',
            'filament.*',
            'livewire.*',
            'ignition.*',
            'api*',
            'login_authorize',
            'login_create',
        ],
    ],

    'image_position' => [
        'options' => [
            'left' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_position.left',
            'center' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_position.center',
            'right' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_position.right',
        ],
        'default' => 'left',
    ],

    'image_width' => [
        'options' => [
            '100%' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_width.100%',
                'class' => 'w-full',
            ],
            '75%' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_width.75%',
                'class' => 'md:w-3/4',
            ],
            '50%' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_width.50%',
                'class' => 'md:w-1/2',
            ],
            '33%' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_width.33%',
                'class' => 'lg:w-1/3',
            ],
            '25%' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_width.25%',
                'class' => 'lg:w-1/4',
            ],
        ],
        'default' => 'full',
    ],

    'call_to_action_buttons' => [
        'options' => [
            'primary' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.primary',
                'class' => 'btn btn--primary',
            ],
            'primary_chevron' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.primary_chevron',
                'class' => 'btn btn--primary btn--ext',
            ],
            'secondary' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.secondary',
                'class' => 'btn btn--secondary',
            ],
            'secondary_chevron' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.secondary_chevron',
                'class' => 'btn btn--secondary btn--ext',
            ],
            'ghost' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.ghost',
                'class' => 'btn btn--ghost',
            ],
            'ghost_chevron' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.ghost_chevron',
                'class' => 'btn btn--ghost btn--ext',
            ],
            'link' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.link',
                'class' => 'link',
            ],
            'link_chevron' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.call_to_action_btn.link_chevron',
                'class' => 'link link--ext',
            ],
        ],
        'default' => 'full',
    ],

    'background_colours' => [
        'options' => [
            'default' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.background_colour.default',
                'class' => '',
            ],
            'primary' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.background_colour.primary',
                'class' => 'bg-primary-500 text-primary-contrast',
            ],
            'secondary' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.background_colour.secondary',
                'class' => 'bg-secondary text-secondary-contrast',
            ],
            'grey' => [
                'label' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.background_colour.grey',
                'class' => 'bg-slate-200',
            ],
        ],
        'default' => 'default',
    ],

    'block_styles' => [
        'enabled_for_all_blocks' => true,
        'options' => [
            'default' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.block_styles.default',
        ],
        'default' => 'default',
    ],

    'grid_columns' => [
        1, 2, 3, 4,
    ],

    'templates' => [
        'partials.footer-nav' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.templates_options.footer',
    ],

    'formatting' => [
        'publishing_dates' => 'd/m/Y G:i',
    ],

    'author_model' => 'App\Models\User',
    //TODO configurable author search fields

    'block_specific' => [
        TextImageBlock::class => [
            'image_position' => [
                'options' => [
                    'left' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_position.left',
                    'right' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.image_position.right',
                ],
                'default' => 'left',
            ],
        ],
        /*TextBlock::class => [
            'block_styles' => [
                'enabled' => true,
                'options' => [
                    'default' => 'filament-flexible-content-blocks::filament-flexible-content-blocks.form_component.content_blocks.block_styles.default',
                    'better' => 'better',
                    'nice' => 'nice',
                ],
            ],
        ],*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Text parameter replacer
    |--------------------------------------------------------------------------
    |
    | Within the text fields of content blocks, you can replace parameters prefixed by a colon (e.g. :name), identical
    | to the way parameters work in translations. The replacer class implements the
    | Statikbe\FilamentFlexibleContentBlocks\Replacer\TextParameterReplacer interface that returns an array
    | of parameters with their value that will be replaced in the text fields of the content blocks.
    |
    | The value of `text_parameter_replacer` should be class name or null. If null is set, parameter replacement is disabled.
     */
    'text_parameter_replacer' => null,
];
