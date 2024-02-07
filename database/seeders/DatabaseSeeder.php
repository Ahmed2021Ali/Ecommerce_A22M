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
        'اضافة قسم',
        'تعديل قسم',
        'حذف قسم',
        'عرض الأقسم',
        'اضافة منتج',
        'تعديل منتج',
        'حذف منتج',
        'عرض المنتجات',
        'اضافة بانر',
        'تعديل بانر',
        'حذف بانر',
        'عرض البانر',
        'اضافة اسلايدر',
        'تعديل اسلايدر',
        'حذف اسلايدر',
        'عرض الاسلايدر',
        'اضافة كوبون',
        'تعديل كوبون',
        'حذف كوبون',
        'عرض الكوبونات',
        'اضافة نوع مستخدم',
        'تعديل نوع مستخدم',
        'حذف نوع مستخدم',
        'عرض انواع المستخدمين',
        'اضافة إذن',
        'تعديل إذن',
        'حذف إذن',
        'عرض الإذونات',
        'اضافة خدمة',
        'تعديل خدمة',
        'حذف خدمة',
        'عرض الخدمات',
        'اضافة ماركة',
        'تعديل ماركة',
        'حذف ماركة',
        'عرض الماركات',
    ];


    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'المدير',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        $role = Role::create(['name' => 'Owner']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
