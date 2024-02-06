<?php

namespace App\Providers;

use App\Repositories\AdminDashboard\CategoryRepository;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use App\Repositories\AdminDashboard\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class,
        );
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class,
        );
    }


    public function boot(): void
    {
        
    }
}
