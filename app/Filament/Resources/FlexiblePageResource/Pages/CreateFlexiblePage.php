<?php

namespace App\Filament\Resources\FlexiblePageResource\Pages;

use App\Filament\Resources\FlexiblePageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFlexiblePage extends CreateRecord
{
    protected static string $resource = FlexiblePageResource::class;

    protected function getTitle(): string
    {
        return "Create Page";
    }
}
