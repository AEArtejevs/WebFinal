<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Dinners'],
            ['name' => 'Lunches'],
            ['name' => 'Breakfasts'],
            ['name' => 'Desserts'],
            ['name' => 'Snacks & Appetizers'],
            ['name' => 'Drinks'],
            ['name' => 'Holidays & Seasons'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
