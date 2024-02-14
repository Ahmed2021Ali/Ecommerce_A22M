<?php

namespace App\Providers;

use App\Models\Size;
use App\Repositories\AdminDashboard\BannerRepository;
use App\Repositories\AdminDashboard\BrandRepository;
use App\Repositories\AdminDashboard\CategoryRepository;
use App\Repositories\AdminDashboard\CityRepository;
use App\Repositories\AdminDashboard\ColorRepository;
use App\Repositories\AdminDashboard\CouponRepository;
use App\Repositories\AdminDashboard\ServiceRepository;
use App\Repositories\AdminDashboard\SizeRepository;
use App\Repositories\AdminDashboard\SliderRepository;
use App\Repositories\Interfaces\AdminDashboard\BannerInterface;
use App\Repositories\Interfaces\AdminDashboard\BrandInterface;
use App\Repositories\Interfaces\AdminDashboard\CategoryInterface;
use App\Repositories\Interfaces\AdminDashboard\CityInterface;
use App\Repositories\Interfaces\AdminDashboard\ColorInterface;
use App\Repositories\Interfaces\AdminDashboard\CouponInterface;
use App\Repositories\Interfaces\AdminDashboard\ProductInterface;
use App\Repositories\AdminDashboard\ProductRepository;
use App\Repositories\AdminDashboard\RoleRepository;
use App\Repositories\AdminDashboard\UserRepository;
use App\Repositories\Interfaces\AdminDashboard\RoleInterface;
use App\Repositories\Interfaces\AdminDashboard\ServiceInterface;
use App\Repositories\Interfaces\AdminDashboard\SizeInterface;
use App\Repositories\Interfaces\AdminDashboard\SliderInterface;
use App\Repositories\Interfaces\AdminDashboard\UserInterface;
use App\Repositories\Interfaces\UserDashboard\CartInterface;
use App\Repositories\Interfaces\UserDashboard\FavInterface;
use App\Repositories\Interfaces\UserDashboard\ProfileInterace;
use App\Repositories\Interfaces\UserDashboard\ReviewInterface;
use App\Repositories\Interfaces\UserDashboard\SearchInterface;
use App\Repositories\UserDashboard\CartRepository;
use App\Repositories\UserDashboard\FavRepository;
use App\Repositories\UserDashboard\ProfileRepository;
use App\Repositories\UserDashboard\ReviewRepository;
use App\Repositories\UserDashboard\SearchRepository;
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
            \App\Repositories\Interfaces\AdminDashboard\OrderInterface::class,
            \App\Repositories\AdminDashboard\OrderRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Interfaces\AdminDashboard\ContactUsInterface::class,
            \App\Repositories\AdminDashboard\ContactUsRepository::class,
        );
        $this->app->bind(
            FavInterface::class,
            FavRepository::class,
        );
        $this->app->bind(
            CartInterface::class,
            CartRepository::class,
        );
        $this->app->bind(
            \App\Repositories\Interfaces\UserDashboard\ContactUsInterface::class,
            \App\Repositories\UserDashboard\ContactUsRepository::class,
        );

        $this->app->bind(
            \App\Repositories\Interfaces\UserDashboard\OrderInterface::class,
            \App\Repositories\UserDashboard\OrderRepository::class,
        );

        $this->app->bind(
            \App\Repositories\Interfaces\UserDashboard\AddressInterface::class,
            \App\Repositories\UserDashboard\AddressRepository::class,
        );
        $this->app->bind(
            CityInterface::class,
            CityRepository::class,
        );

        $this->app->bind(
            ProfileInterace::class,
            ProfileRepository::class,
        );

        $this->app->bind(
            \App\Repositories\Interfaces\UserDashboard\ProductInterface::class,
            \App\Repositories\UserDashboard\ProductRepository::class,
        );

        $this->app->bind(
            SearchInterface::class,
            SearchRepository::class,
        );

        $this->app->bind(
            ReviewInterface::class,
            ReviewRepository::class,
        );
        $this->app->bind(
            ColorInterface::class,
            ColorRepository::class,
        );
        $this->app->bind(
            SizeInterface::class,
            SizeRepository::class,
        );
    }


    public function boot(): void
    {

    }
}
