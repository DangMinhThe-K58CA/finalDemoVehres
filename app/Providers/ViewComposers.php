<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;

class ViewComposers extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (auth()->guest() == false) {
            // view()->composer('*', function ($view)
            // {
            //     $notifications = Auth::user()->unreadNotifications;

            //     $view->with('notifications', $notifications);
            // });
            $notifications = Auth::user()->unreadNotifications;

            View::share('admins.layouts.notifications', $notifications);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
