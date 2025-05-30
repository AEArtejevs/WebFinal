<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipes extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable =
    [
        'name',
        'description',
        'instructions',
        'duration',
        'image',
        'category_id',
        'user_id',
    ];

    public function Users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class, 'recipe_ingredients', 'recipe_id', 'ingredient_id')
            ->withPivot('quantity', 'unit')
            ->withTimestamps();
    }
}
