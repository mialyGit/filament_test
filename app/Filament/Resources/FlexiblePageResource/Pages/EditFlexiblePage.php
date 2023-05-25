<?php

namespace App\Filament\Resources\FlexiblePageResource\Pages;

use App\Filament\Resources\FlexiblePageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFlexiblePage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = FlexiblePageResource::class;

    protected function getTitle(): string
    {
        return "Edit Page";
    }

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
