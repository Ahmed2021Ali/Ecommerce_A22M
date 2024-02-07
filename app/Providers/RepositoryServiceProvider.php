<?php

namespace App\Providers;

use App\Repositories\AdminDashboard\BannerRepository;
use App\Repositories\AdminDashboard\CategoryRepository;
use App\Repositories\AdminDashboard\SliderRepository;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use App\Repositories\AdminDashboard\ProductRepository;
use App\Repositories\AdminDashboard\RoleRepository;
use App\Repositories\AdminDashboard\UserRepository;
use App\Repositories\Interfaces\AdminDashboard\RoleInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use App\Repositories\Interfaces\AdminDashboard\UserInterface;
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
<<<<<<< Updated upstream

        $this->app->bind(
            RoleInterface::class,
            RoleRepository::class,
        );

        $this->app->bind(
            UserInterface::class,
            UserRepository::class,
=======
        $this->app->bind(
            BannerInterface::class,
            BannerRepository::class,
>>>>>>> Stashed changes
        );
    }


    public function boot(): void
    {

    }
}
