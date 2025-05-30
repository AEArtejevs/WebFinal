<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    /** @use HasFactory<\Database\Factories\IngrediantsFactory> */
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(IngredientsCategories::class, 'category_id');
    }
}
