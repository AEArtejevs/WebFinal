<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IngredientsCategories;

class IngredientsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Additive',
            'Bakery',
            'Beverage',
            'Beverage Alcoholic',
            'Cereal',
            'Dairy',
            'Dish',
            'Essential Oil',
            'Fish',
            'Flower',
            'Fruit',
            'Fungus',
            'Herb',
            'Legume',
            'Maize',
            'Meat',
            'Nuts & Seed',
            'Plant',
            'Seafood',
            'Spice',
            'Vegetable',
        ];

        foreach ($categories as $name) {
            IngredientsCategories::create(['name' => $name]);
        }
    }
}
