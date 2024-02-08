<?php

namespace App\Providers;

use App\Models\Service;
use App\Repositories\AdminDashboard\BannerRepository;
use App\Repositories\AdminDashboard\BrandRepository;
use App\Repositories\AdminDashboard\CategoryRepository;
use App\Repositories\AdminDashboard\ContactUsRepository;
use App\Repositories\AdminDashboard\CouponRepository;
use App\Repositories\AdminDashboard\OrderRepository;
use App\Repositories\AdminDashboard\ServiceRepository;
use App\Repositories\AdminDashboard\SliderRepository;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use App\Repositories\Interfaces\AdminDashboard\ContactUsInterface;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;
use App\Repositories\Interfaces\AdminDashboard\OrderInterface;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use App\Repositories\AdminDashboard\ProductRepository;
use App\Repositories\AdminDashboard\RoleRepository;
use App\Repositories\AdminDashboard\UserRepository;
use App\Repositories\Interfaces\AdminDashboard\RoleInterface;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use App\Repositories\Interfaces\AdminDashboard\UserInterface;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use App\Repositories\UserDashboard\CartRepository;
use App\Repositories\UserDashboard\FavRepository;
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

        $this->app->bind(
            RoleInterface::class,
            RoleRepository::class,
        );

        $this->app->bind(
            UserInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            BannerInterface::class,
            BannerRepository::class,
        );
        $this->app->bind(
            ServiceInterface::class,
            ServiceRepository::class,
        );
        $this->app->bind(
            BrandInterface::class,
            BrandRepository::class,
        );
        $this->app->bind(
            CouponInterface::class,
            CouponRepository::class,
        );
        $this->app->bind(
            OrderInterface::class,
            OrderRepository::class,
        );
        $this->app->bind(
            ContactUsInterface::class,
            ContactUsRepository::class,
        );
        $this->app->bind(
            FavInterface::class,
            FavRepository::class,
        );
        $this->app->bind(
            CartInterface::class,
            CartRepository::class,
        );
    }


    public function boot(): void
    {

    }
}
