<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IngredientsRecipes extends Model
{
    use HasFactory;

    protected $table = 'recipe_ingredients'; // your pivot table name

    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity',
        'unit',
    ];

    // If you want to disable timestamps (if not used in pivot)
    public $timestamps = true; // or false if you don't use created_at/updated_at

    // Relationships (optional but useful)

    public function recipe()
    {
        return $this->belongsTo(Recipes::class, 'recipe_id');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredients::class, 'ingredient_id');
    }
}
