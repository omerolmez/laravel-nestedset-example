<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 10000000; $i++) {
            $categoryId = Category::orderByRaw("RAND()")
                ->first()
                ->id;
            Product::create([
                'name' => ucfirst($faker->word()),
                'price' => $faker->randomNumber(2),
                'category_id' => $categoryId
            ]);
        }
    }
}
