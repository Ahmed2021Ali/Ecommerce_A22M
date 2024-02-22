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

            if ($user->can('الأقسام') || $user->can('اضافة قسم') || $user->can('تعديل قسم') || $user->can('حذف قسم') || $user->can('عرض صورة القسم') || $user->can('عرض المنتجات الخاصة بالقسم')) {
                $event->menu->add([
                    'text' => 'الأقسام',
                    'icon' => 'fas fa-list',
                    'route' => 'category.index',
                ]);
            }

            if ($user->can('المنتجات') || $user->can('اضافة منتج') || $user->can('تعديل منتج') || $user->can('حذف منتج') || $user->can('عرض صورة المنتج') || $user->can(' تقييمات المنتج')) {
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
                    ],
                ]);
            }

            if ($user->can('الألوان') || $user->can('اضافة الألوان') || $user->can('تعديل الألوان') || $user->can('حذف الألوان')) {
                $event->menu->add([
                    'text' => 'الوان المنتجات',
                    'icon' => 'fas fa-paint-brush',
                    'route' => 'color.index',
                ]);
            }

            if ($user->can('المقاسات') || $user->can('اضافة مقاسات') || $user->can('تعديل مقاسات') || $user->can('حذف مقاسات')) {
                $event->menu->add([
                    'text' => 'مقاسات المنتجات',
                    'icon' => 'fas fa-ruler',
                    'route' => 'size.index',
                ]);
            }

            if ($user->can('اسلايدر') || $user->can('اضافة اسلايدر') || $user->can('تعديل اسلايدر') || $user->can('حذف اسلايدر') || $user->can('عرض صورة اسلايدر')) {
                $event->menu->add([
                    'text' => 'الأسلايدر',
                    'icon' => 'fas fa-images',
                    'route' => 'slider.index',
                ]);
            }

            if ($user->can('بانر') || $user->can('اضافة بانر') || $user->can('تعديل بانر') || $user->can('حذف بانر') || $user->can('عرض صورة بانر')) {
                $event->menu->add([
                    'text' => 'بانر',
                    'icon' => 'fas fa-flag',
                    'route' => 'banner.index',
                ]);
            }

            if ($user->can('نوع المستخدم') || $user->can('اضافة نوع مستخدم') || $user->can(' تعديل نوع مستخدم') || $user->can(' حذف نوع مستخد')) {
                $event->menu->add([
                    'text' => 'صلاحيات المستخدم',
                    'icon' => 'fas fa-user',
                    'route' => 'roles.index',
                ]);
            }

            if ($user->can('المستخدمين') || $user->can('اضافة مستخدم') || $user->can('تعديل مستخدم') || $user->can('حذف مستخدم')) {
                $event->menu->add([
                    'text' => 'المستخدمين',
                    'icon' => 'fas fa-users',
                    'route' => 'users.index',
                ]);
            }

            if ($user->can('الخدمات') || $user->can('اضافة خدمة') || $user->can('تعديل خدمة') || $user->can('حذف خدمة') || $user->can('عرض صورة الخدمة')) {
                $event->menu->add([
                    'text' => 'الخدمات',
                    'icon' => 'fas fa-concierge-bell',
                    'route' => 'service.index',
                ]);
            }

            if ($user->can('البراندات') || $user->can('اضافة براند') || $user->can('تعديل براند') || $user->can('حذف براند') || $user->can('عرض صورة براند')) {
                $event->menu->add([
                    'text' => 'البرندات',
                    'icon' => 'fas fa-star',
                    'route' => 'brand.index',
                ]);
            }

            if ($user->can('الكوبونات') || $user->can('اضافة كوبون') || $user->can('تعديل كوبون') || $user->can('حذف كوبون')) {
                $event->menu->add([
                    'text' => 'الكوبونات',
                    'icon' => 'fas fa-ticket-alt',
                    'route' => 'coupon.index',
                ]);
            }

            if ($user->can('الإستفسارات') || $user->can('حذف الإستفسارات')) {
                $event->menu->add([
                    'text' => 'إستفسارات العملاء',
                    'icon' => 'fas fa-comments',
                    'route' => 'contact.index',
                ]);
            }

            if ($user->can('الأوردارات') || $user->can(' اوردارات تم توصيلها') || $user->can('اوردارات لم يتم توصيلها') || $user->can(' اوردارات تم إلغائها') || $user->can(' تأكيد توصيل الأوردر') || $user->can(' حذف الأوردر')) {
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

            }

            if ($user->can('المحافظات') || $user->can('اضافة محافظة') || $user->can('تعديل محافظة') || $user->can('حذف محافظة')) {
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
