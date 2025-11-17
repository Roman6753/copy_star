<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use MoonShine\Laravel\Models\MoonshineUser;
use MoonShine\Laravel\Models\MoonshineUserRole;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $adminRole = MoonshineUserRole::firstOrCreate([
            'name' => 'Admin',
        ]);

        MoonshineUser::firstOrCreate(
            ['email' => 'admin@copystar.ru'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin11'),
                'moonshine_user_role_id' => $adminRole->id,
            ]
        );

        User::factory()->create([
            'name' => 'Админ',
            'surname' => 'Системный',
            'patronymic' => 'Админович',
            'login' => 'admin',
            'email' => 'admin@copystar.ru',
            'password' => Hash::make('admin11'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Иван',
            'surname' => 'Иванов',
            'patronymic' => 'Иванович',
            'login' => 'user1',
            'email' => 'user@copystar.ru',
            'password' => bcrypt('password'),
        ]);

        User::factory(10)->create();
        Product::factory(50)->create();
        Category::factory(20)->create();
        OrderItem::factory(30)->create();
        Order::factory(20)->create();
    }
}