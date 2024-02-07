<?php

namespace App\Providers;

use App\Repositories\AdminDashboard\CategoryRepository;
use App\Repositories\AdminDashboard\SliderRepository;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use App\Repositories\AdminDashboard\ProductRepository;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
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
        $this->app->bind(
            SliderInterface::class,
            SliderRepository::class,
        );
    }


    public function boot(): void
    {

    }
}
