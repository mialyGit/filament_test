<?php

namespace App\Providers;

use Awcodes\Curator\Facades\Curator;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\MediaResource;
use Awcodes\Curator\Resources\MediaResource as CuratorMediaResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Curator::navigationGroup('Media');
        // $this->app->bind(CuratorMediaResource::class, fn() => new MediaResource());
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
