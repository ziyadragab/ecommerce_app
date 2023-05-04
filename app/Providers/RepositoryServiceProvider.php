<?php

namespace App\Providers;

use App\Http\interfaces\Admin\AdInterface;
use App\Http\interfaces\Admin\AdminAuthInterface;
use App\Http\interfaces\Admin\CategoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\interfaces\Admin\HomeInterface;
use App\Http\interfaces\Admin\ProductInterface;
use App\Http\interfaces\EndUser\AuthInterface;
use App\Http\interfaces\EndUser\HomeInterface as EndUserHomeInterface;
use App\Http\Repositories\Admin\AdminAuthRepository;
use App\Http\Repositories\Admin\AdRepository;
use App\Http\Repositories\Admin\CategoryRepository;
use App\Http\Repositories\Admin\HomeRepository;
use App\Http\Repositories\Admin\ProductRepository;
use App\Http\Repositories\EndUser\AuthRepository;
use App\Http\Repositories\EndUser\HomeRepository as EndUserHomeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        /**
         * Admin
         */
       $this->app->bind(
        HomeInterface::class,
        HomeRepository::class,
       );
       $this->app->bind(
        AdminAuthInterface::class,
        AdminAuthRepository::class,
       );
       $this->app->bind(
        CategoryInterface::class,
        CategoryRepository::class,
       );
       $this->app->bind(
        ProductInterface::class,
        ProductRepository::class,
       );
       $this->app->bind(
        AdInterface::class,
        AdRepository::class,
       );


       /**
        * End User
        */
       $this->app->bind(
        AuthInterface::class,
        AuthRepository::class,
       );
       $this->app->bind(
        EndUserHomeInterface::class,
        EndUserHomeRepository::class,
       );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}