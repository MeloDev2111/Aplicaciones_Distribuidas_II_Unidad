<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {

        \Route::resourceVerbs([
            'create'=>'crear',
            'edit'=>'editar',
        ]);

        //Schema::defaultStringLength(191);
    }
}
