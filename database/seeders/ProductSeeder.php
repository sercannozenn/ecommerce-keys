<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('en');

        for ($i = 0; $i < 5; $i++)
        {
            $category = Category::create([
                'category_name' => $faker->word(),
                'is_active' => 1
            ]);
            for ($k = 0; $k < 5; $k++)
            {
                $name = $faker->word();
                Product::create([
                        'product_name' => $name,
                        'slug' => Str::slug($name),
                        'product_short_description' => $faker->text(rand(10, 50)),
                        'product_description' => $faker->text(),
                        'product_code' => $faker->numerify('ABC###'),
                        'quantity' => rand(2,10),
                        'price' => $faker->randomFloat(2,10, 200),
                        'is_active' => 1,
                        'category_id' => $category->category_id,
                    ]);
            }
        }
    }
}
