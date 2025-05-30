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
        IngredientsCategories::create(["name" => "Additive"]);
        IngredientsCategories::create(["name" => "Bakery"]);
        IngredientsCategories::create(["name" => "Beverage"]);
        IngredientsCategories::create(["name" => "Beverage Alcoholic"]);
        IngredientsCategories::create(["name" => "Cereal"]);
        IngredientsCategories::create(["name" => "Dairy"]);
        IngredientsCategories::create(["name" => "Dish"]);
        IngredientsCategories::create(["name" => "Essential Oil"]);
        IngredientsCategories::create(["name" => "Fish"]);
        IngredientsCategories::create(["name" => "Flower"]);
        IngredientsCategories::create(["name" => "Fruit"]);
        IngredientsCategories::create(["name" => "Fungus"]);
        IngredientsCategories::create(["name" => "Herb"]);
        IngredientsCategories::create(["name" => "Legume"]);
        IngredientsCategories::create(["name" => "Maize"]);
        IngredientsCategories::create(["name" => "Meat"]);
        IngredientsCategories::create(["name" => "Nuts & Seed"]);
        IngredientsCategories::create(["name" => "Plant"]);
        IngredientsCategories::create(["name" => "Seafood"]);
        IngredientsCategories::create(["name" => "Spice"]);
        IngredientsCategories::create(["name" => "Vegetable"]);
    }
}
