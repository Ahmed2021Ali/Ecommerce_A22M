<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    private $permissions = [

        'الأقسام',
        'اضافة قسم',
        'تعديل قسم',
        'حذف قسم',
        'عرض صورة القسم',
        'عرض المنتجات الخاصة بالقسم',


        'المنتجات',
        'اضافة منتج',
        'تعديل منتج',
        'حذف منتج',
        'عرض صورة المنتج',
        'تقييمات المنتج',

        'الألوان',
        'اضافة الوان',
        'تعديل الوان',
        'حذف الوان',


        'المقاسات',
        'اضافة مقاسات',
        'تعديل مقاسات',
        'حذف مقاسات',


        'اسلايدر',
        'اضافة اسلايدر',
        'تعديل اسلايدر',
        'حذف اسلايدر',
        'عرض صورة الاسلايدر',


        
        'بانر',
        'اضافة بانر',
        'تعديل بانر',
        'حذف بانر',
        'عرض صورة البانر',

        //roles
        'نوع المستخدم',
        'اضافة نوع مستخدم',
        'تعديل نوع مستخدم',
        'حذف نوع مستخدم',
        'عرض نوع مستخدم',



        'المستخدمين',
        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',



        'الخدمات',
        'اضافة خدمة',
        'تعديل خدمة',
        'حذف خدمة',
        'عرض صورة الخدمة',



        'البراندات',
        'اضافة براند',
        'تعديل براند',
        'حذف براند',
        'عرض صورة براند',


        'الكوبونات',
        'اضافة كوبون',
        'تعديل كوبون',
        'حذف كوبون',

        
        
        'الإستفسارات',
        'حذف الإستفسارات',
        


        'الأوردارات',
        'اوردارات تم توصيلها',
        'اوردارات لم يتم توصيلها',
        'اوردارات تم إلغائها',
        'تأكيد توصيل الأوردر',


        'المحافظات',
        'اضافة محافظة',
        'تعديل محافظة',
        'حذف محافظة',

    ];


    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create owner User and assign the role to him.
        $user = User::create([
            'name' => 'المدير',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        $role = Role::create(['name' => 'المدير']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
