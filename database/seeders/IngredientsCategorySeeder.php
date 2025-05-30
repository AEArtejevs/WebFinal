<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class IngredientsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["name" => "Additive"]);
        Category::create(["name" => "Bakery"]);
        Category::create(["name" => "Beverage"]);
        Category::create(["name" => "Beverage Alcoholic"]);
        Category::create(["name" => "Cereal"]);
        Category::create(["name" => "Dairy"]);
        Category::create(["name" => "Dish"]);
        Category::create(["name" => "Essential Oil"]);
        Category::create(["name" => "Fish"]);
        Category::create(["name" => "Flower"]);
        Category::create(["name" => "Fruit"]);
        Category::create(["name" => "Fungus"]);
        Category::create(["name" => "Herb"]);
        Category::create(["name" => "Legume"]);
        Category::create(["name" => "Maize"]);
        Category::create(["name" => "Meat"]);
        Category::create(["name" => "Nuts & Seed"]);
        Category::create(["name" => "Plant"]);
        Category::create(["name" => "Seafood"]);
        Category::create(["name" => "Spice"]);
        Category::create(["name" => "Vegetable"]);
    }
}
