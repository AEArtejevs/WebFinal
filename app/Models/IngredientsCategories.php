<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientsCategories extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientsCategoriesFactory> */
    use HasFactory;

    protected $table = 'ingredients_categories';
    public $timestamps = true;

    protected $fillable = ['name'];

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class, 'category_id');
    }
}
