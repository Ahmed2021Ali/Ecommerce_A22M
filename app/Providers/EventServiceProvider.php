<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = Auth::user();

            $event->menu->add('لوحة التحكم');

            $event->menu->add([
                'text' => 'الصفحة الرئيسية',
                'icon' => 'fas fa-home',
                'route' => 'admin.dashboard',
            ]);

            $event->menu->add([
                'text' => 'الموقع الإلكتروني',
                'icon' => 'fas fa-globe',
                'route' => 'home',
            ]);

            if ($user->can('الأقسام')) {
                $event->menu->add([
                    'text' => 'الأقسام',
                    'icon' => 'fas fa-list',
                    'route' => 'category.index',
                ]);
            }
            if ($user->can('الأقسام الفرعية')) {
                $event->menu->add([
                    'text' => 'الأقسام الفرعية',
                    'icon' => 'fas fa-list',
                    'route' => 'sub-category.index',
                ]);
            }

            if ($user->can('المنتجات')) {
                $event->menu->add([
                    'text' => 'عرض المنتجات',
                    'icon' => 'fas fa-list-alt',
                    'route' => 'product.index',

                ]);
            }
            if ($user->can('اضافة منتج')) {
                $event->menu->add([
                    'text' => 'إضافة منتج جديد',
                    'icon' => 'fas fa-plus-circle',
                    'route' => 'product.create',
                ],);
            }

            if ($user->can('الألوان')) {
                $event->menu->add([
                    'text' => 'الوان المنتجات',
                    'icon' => 'fas fa-paint-brush',
                    'route' => 'color.index',
                ]);
            }

            if ($user->can('المقاسات')) {
                $event->menu->add([
                    'text' => 'مقاسات المنتجات',
                    'icon' => 'fas fa-ruler',
                    'route' => 'size.index',
                ]);
            }

            if ($user->can('اسلايدر')) {
                $event->menu->add([
                    'text' => 'الأسلايدر',
                    'icon' => 'fas fa-images',
                    'route' => 'slider.index',
                ]);
            }

            if ($user->can('بانر')) {
                $event->menu->add([
                    'text' => 'بانر',
                    'icon' => 'fas fa-flag',
                    'route' => 'banner.index',
                ]);
            }

            if ($user->can('نوع المستخدم') ) {
                $event->menu->add([
                    'text' => 'صلاحيات المستخدم',
                    'icon' => 'fas fa-user',
                    'route' => 'roles.index',
                ]);
            }

            if ($user->can('المستخدمين')) {
                $event->menu->add([
                    'text' => 'المستخدمين',
                    'icon' => 'fas fa-users',
                    'route' => 'users.index',
                ]);
            }

            if ($user->can('الخدمات')) {
                $event->menu->add([
                    'text' => 'الخدمات',
                    'icon' => 'fas fa-concierge-bell',
                    'route' => 'service.index',
                ]);
            }

            if ($user->can('البراندات')) {
                $event->menu->add([
                    'text' => 'البرندات',
                    'icon' => 'fas fa-star',
                    'route' => 'brands.index',
                ]);
            }

            if ($user->can('الكوبونات')) {
                $event->menu->add([
                    'text' => 'الكوبونات',
                    'icon' => 'fas fa-ticket-alt',
                    'route' => 'coupon.index',
                ]);
            }

            if ($user->can('الإستفسارات')) {
                $event->menu->add([
                    'text' => 'إستفسارات العملاء',
                    'icon' => 'fas fa-comments',
                    'route' => 'contact.index',
                ]);
            }
            if ($user->can('الأوردارات')) {
                $event->menu->add([
                    'text' => 'اوردرات لم يتم توصيلها',
                    'icon' => 'fas fa-hourglass-half',
                    'route' => 'order.index',
                ]);
            }
            if ($user->can('الأوردارات')) {
                $event->menu->add([
                    'text' => 'اوردرات تم توصيلها',
                    'icon' => 'fas fa-check-circle',
                    'route' => 'order.done',
                ]);
            }

            if ($user->can('الأوردارات')) {
                $event->menu->add([
                    'text' => 'اوردرات تم الغاؤها',
                    'icon' => 'fas fa-times-circle',
                    'route' => 'order.cancelled',
                ]);
            }

            if ($user->can('المحافظات')) {
                $event->menu->add([
                    'text' => 'المحافظات المتاحة للتوصيل',
                    'icon' => 'fas fa-map-marker-alt',
                    'route' => 'city.index',
                ]);
            }
        });
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
