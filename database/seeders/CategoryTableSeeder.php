<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 151; $i++) {
            $parentId = null;
            if ($i % 5 == 0) {
                $parentId = Category::orderByRaw("RAND()")
                    ->first()
                    ->id;
            }
            Category::create([
                'parent_id' => $parentId,
                'name' => $faker->jobTitle()
            ]);
        }
    }
}
