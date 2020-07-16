<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            Product::create([
                'name' => $faker->name,
                'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
                'category'=> $faker->word,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99)
            ]);
        }
    }
}
