<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class FilamentLoginCustomizationProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Filament::serving(function () {
            View::composer('filament::auth.login', function ($view) {
                $view->with('registerUrl', route('filament.pages.register-user'));
            });
        });
    }
}
