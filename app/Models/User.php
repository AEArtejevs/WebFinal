<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Recipes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

   protected $fillable = [
    'name',
    'last_name',
    'email',
    'password',
    'role',
    'profile_image',
   ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password', //=> 'hashed',
        ];
    }
    public function favorites()
    {
        return $this->belongsToMany(Recipes::class, 'favorites', 'user_id', 'recipe_id');
    }
    public function recipes()
    {
        return $this->hasMany(Recipes::class, 'user_id', 'id');
    }
}

