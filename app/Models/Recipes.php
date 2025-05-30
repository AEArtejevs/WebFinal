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
    'id',
    'name',
    'duration',
    'descriptions',
    'img',
    'category_id',
    'user_id'
    ];

    public function Users()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
    public function Category()
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }

}
