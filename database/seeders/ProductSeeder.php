<?php

namespace Database\Seeders;


use App\Models\Products\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(99)->create();

        Product::create([
            'name' => 'yeltsa kcir',
            'category_id' => 2,
            'description' => '<h2><a class="text-red-500 underline animate-ping" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">do not click me!</a></h2>',
            'date_and_time' => now()
        ]);
    }
}
