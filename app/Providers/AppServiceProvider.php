<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\View;
use App\Models\Position;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.modals', function ($view) {
            // Avoid querying if already passed (though typically composer runs before rendering,
            // checking data that might be passed from controller can be tricky given internal lifecycle,
            // but safe to just provide it if it's critical for this component)
            if (!isset($view->getData()['positions'])) {
                $view->with('positions', Position::all()->toArray());
            }
        });
    }
}
