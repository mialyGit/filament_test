<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\Linkable;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasSEOAttributes;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasIntroAttribute;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasPageAttributes;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasMediaAttributes;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasAuthorAttributeTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasDefaultContentBlocksTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasTranslatedContentBlocksTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasTranslatedSEOAttributesTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasTranslatedSlugAttributeTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasTranslatedIntroAttributeTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasTranslatedPageAttributesTrait;

class FlexiblePage extends Model implements HasMedia, HasMediaAttributes, HasPageAttributes, HasContentBlocks, HasIntroAttribute, HasSEOAttributes, Linkable
{
    use HasTranslations;
    use HasFactory;
    use HasTranslatedPageAttributesTrait;
    use HasTranslatedIntroAttributeTrait;
    use HasAuthorAttributeTrait;
    use HasTranslatedSlugAttributeTrait;
    use HasTranslatedSEOAttributesTrait;
    use HasTranslatedContentBlocksTrait;
    use HasDefaultContentBlocksTrait;

    protected $table = 'pages';

    public function getViewUrl(?string $locale = null): string
    {
        //todo implement controller and add route:
        return config('app.url');
    }

    public function getPreviewUrl(?string $locale = null): string
    {
        return $this->getViewUrl($locale);
    }
}
