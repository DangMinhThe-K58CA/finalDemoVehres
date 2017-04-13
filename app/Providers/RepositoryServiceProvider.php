<?php

namespace App\Providers;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\BookmarkRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\VisitRepositoryInterface;
use App\Repositories\Eloquent\ArticleRepository;
use App\Repositories\Eloquent\BookmarkRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\VisitRepository;
use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\Contracts\GarageRepositoryInterface;
use App\Repositories\Eloquent\GarageRepository;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Eloquent\ArticleRepository;
use SebastianBergmann\Comparator\Book;

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
        App::bind(CommentRepositoryInterface::class, CommentRepository::class);
        App::bind(BookmarkRepositoryInterface::class, BookmarkRepository::class);
        App::bind(VisitRepositoryInterface::class, VisitRepository::class);
        App::bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        App::bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
