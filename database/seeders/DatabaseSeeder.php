<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

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
