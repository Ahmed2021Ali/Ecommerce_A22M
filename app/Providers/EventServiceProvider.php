<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
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
            $event->menu->add([
                'text' => 'الأقسام',
                'icon' => 'fas fa-list',
                'route' => 'category.index',
            ]);
            $event->menu->add([
                'text' => 'المنتجات',
                'icon' => 'fas fa-shopping-bag',
                'submenu' => [
                    [
                        'text' => 'عرض المنتجات',
                        'icon' => 'fas fa-list-alt',
                        'route' => 'product.index',
                    ],
                    [
                        'text' => 'إضافة منتج جديد',
                        'icon' => 'fas fa-plus-circle',
                        'route' => 'product.create',
                    ],

                    [
                        'text' => 'الوان المنتجات',
                        'icon' => 'fas fa-paint-brush',
                        'route' => 'color.index',
                    ],
                    [
                        'text' => 'مقاسات المنتجات',
                        'icon' => 'fas fa-ruler',
                        'route' => 'size.index',
                    ],
                ],
            ]);
            $event->menu->add([
                'text' => 'الأسلايدر',
                'icon' => 'fas fa-images',
                'route' => 'slider.index',
            ]);
            $event->menu->add([
                'text' => 'بانر',
                'icon' => 'fas fa-flag',
                'route' => 'banner.index',
            ]);
            $event->menu->add([
                'text' => 'صلاحيات المستخدم',
                'icon' => 'fas fa-user',
                'route' => 'roles.index',
            ]);
            $event->menu->add([
                'text' => 'المستخدمين',
                'icon' => 'fas fa-users',
                'route' => 'users.index',
            ]);
            $event->menu->add([
                'text' => 'الخدمات',
                'icon' => 'fas fa-concierge-bell',
                'route' => 'service.index',
            ]);
            $event->menu->add([
                'text' => 'البرندات',
                'icon' => 'fas fa-star',
                'route' => 'brand.index',
            ]);
            $event->menu->add([
                'text' => 'الكوبونات',
                'icon' => 'fas fa-ticket-alt',
                'route' => 'coupon.index',
            ]);
            $event->menu->add([
                'text' => 'إستفسارات العملاء',
                'icon' => 'fas fa-comments',
                'route' => 'contact.index',
            ]);
            $event->menu->add([
                'text' => 'الأوردرات ',
                'icon' => 'fas fa-shopping-cart',
                'submenu' => [
                    [
                        'text' => 'اوردرات لم يتم توصيلها',
                        'icon' => 'fas fa-hourglass-half',
                        'route' => 'order.index',
                    ],
                    [
                        'text' => 'اوردرات تم توصيلها',
                        'icon' => 'fas fa-check-circle',
                        'route' => 'order.done',
                    ],
                    [
                        'text' => 'اوردرات تم الغاؤها',
                        'icon' => 'fas fa-times-circle',
                        'route' => 'order.cancelled',
                    ],

                ],
            ]);
            $event->menu->add([
                'text' => 'المحافظات المتاحة للتوصيل',
                'icon' => 'fas fa-map-marker-alt',
                'route' => 'city.index',
            ]);


        });
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
