<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coffeeId = Str::uuid();
        $nonCoffeeId = Str::uuid();
        $bakeryId = Str::uuid();
        $iceCreamId = Str::uuid();

        DB::table('categories')->insert([
            'id' => $coffeeId,
            'title' => 'Coffee',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('categories')->insert([
            'id' => $nonCoffeeId,
            'title' => 'Non-Coffee',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('categories')->insert([
            'id' => $iceCreamId,
            'title' => 'Ice Cream',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('categories')->insert([
            'id' => $bakeryId,
            'title' => 'Bakery',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        echo "Inserted product ID: " . $coffeeId;
        DB::table('products')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Black Coffee',
                'image_url' => 'https://images.unsplash.com/photo-1494314671902-399b18174975?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Latte',
                'image_url' => 'https://images.unsplash.com/photo-1561882468-9110e03e0f78?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGxhdHRlfGVufDB8fDB8fHww',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Caramel Latte',
                'image_url' => 'https://images.unsplash.com/photo-1599398054066-846f28917f38?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Cappuccino',
                'image_url' => 'https://images.unsplash.com/photo-1557006021-b85faa2bc5e2?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Americano',
                'image_url' => 'https://images.unsplash.com/photo-1532004491497-ba35c367d634?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Espresso',
                'image_url' => 'https://images.unsplash.com/photo-1579992357154-faf4bde95b3d?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Macchiato',
                'image_url' => 'https://images.unsplash.com/photo-1557772611-722dabe20327?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Mocha',
                'image_url' => 'https://images.unsplash.com/photo-1607260550778-aa9d29444ce1?auto=format&fit=crop&q=80&w=1887&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Hot Chocolate',
                'image_url' => 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fGhvdCUyMGNob2NvbGF0ZXxlbnwwfHwwfHx8MA%3D%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Chai Latte',
                'image_url' => 'https://images.unsplash.com/photo-1578899952107-9c390f1af1b7?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGNoYWklMjBsYXR0ZXxlbnwwfHwwfHx8MA%3D%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Matcha Latte',
                'image_url' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bWF0Y2hhJTIwbGF0dGV8ZW58MHx8MHx8fDA%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Seasonal Brew',
                'image_url' => 'https://images.unsplash.com/photo-1611162458324-aae1eb4129a4?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTg1fHxibGFjayUyMGNvZmZlZXxlbnwwfHwwfHx8MA%3D%3D',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Svart Te',
                'image_url' => 'https://images.unsplash.com/photo-1576092768241-dec231879fc3?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHRlYXxlbnwwfHwwfHx8MA%3D%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Islatte',
                'image_url' => 'https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8aWNlZCUyMGxhdHRlfGVufDB8fDB8fHww',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Islatte Mocha',
                'image_url' => 'https://images.unsplash.com/photo-1642647391072-6a2416f048e5?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzh8fGljZWQlMjBtb2NoYSUyMGxhdHRlfGVufDB8fDB8fHww',
                'category_id' => $coffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Frapino Caramel',
                'image_url' => 'https://images.unsplash.com/photo-1662047102608-a6f2e492411f?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJhcGlubyUyMGNhcmFtZWx8ZW58MHx8MHx8fDA%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Frapino Mocka',
                'image_url' => 'https://images.unsplash.com/photo-1530373239216-42518e6b4063?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZnJhcGlubyUyMG1vY2hhfGVufDB8fDB8fHww',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Apelsinjuice',
                'image_url' => 'https://images.unsplash.com/photo-1600271886742-f049cd451bba?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fG9yYW5nZSUyMGp1aWNlfGVufDB8fDB8fHww',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Frozen Lemonade',
                'image_url' => 'https://images.unsplash.com/photo-1523371054106-bbf80586c38c?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGxlbW9uYWRlJTIwd2l0aCUyMGljZXxlbnwwfHwwfHx8MA%3D%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Lemonad',
                'image_url' => 'https://images.unsplash.com/photo-1621263764928-df1444c5e859?auto=format&fit=crop&q=60&w=800&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8bGVtb25hZGV8ZW58MHx8MHx8fDA%3D',
                'category_id' => $nonCoffeeId,
                'created_at' => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
            ],
        ]);
    }
}
