<?php

namespace App\Providers;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.*', function($view){
            $providers_not_visible = Provider::where('visible', 0)->count();
            $view->with('providers_not_visible', $providers_not_visible);
        });

        view()->composer('web.*', function($view){
            $provider_not_visible = null;

            if (auth()->check() && User::findOrFail(auth()->user()->id)->isProvider()) {
                $provider = Provider::where('user_id', auth()->user()->id)->first();
                $provider_not_visible = !$provider->visible;
            }

            $view->with('provider_not_visible', $provider_not_visible);
        });
    }
}
