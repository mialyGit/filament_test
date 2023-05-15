<?php

namespace App\Filament\Resources\FlexiblePageResource\Pages;

use App\Filament\Resources\FlexiblePageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFlexiblePages extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    
    protected static string $resource = FlexiblePageResource::class;

    protected function getTitle(): string
    {
        return "Pages";
    }

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->label('New page'),
        ];
    }
}
