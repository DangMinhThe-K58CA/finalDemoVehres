<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\Contracts\GarageRepositoryInterface;
use App\Repositories\Eloquent\GarageRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(GarageRepositoryInterface::class, GarageRepository::class);
        App::bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
