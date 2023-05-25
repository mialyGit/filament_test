<?php

namespace App\Providers;

use Awcodes\Curator\Facades\Curator;
use Illuminate\Support\ServiceProvider;
// use App\Filament\Resources\CustomMediaResource;
// use Awcodes\Curator\Resources\MediaResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Curator::resourceLabel('Media')->pluralResourceLabel('Medias');
        // $this->app->bind(MediaResource::class, fn() => new CustomMediaResource());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
