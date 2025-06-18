<?php

use App\Http\Controllers\RecipesController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

// Public home routes
Route::get('/', [RecipesController::class, 'home'])->name('home');
Route::get('/recipes', [RecipesController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{id}', [RecipesController::class, 'show'])->name('recipes.show');
Route::get('/category/{id}', [RecipesController::class, 'recipesByCategory'])->name('category.show');

// Authentication routes (guest access)
Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/register', [CustomRegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [CustomRegisterController::class, 'register'])->name('register');

// Routes requiring auth middleware


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    
    // Recipes management
    Route::get('/my-recipes', [RecipesController::class, 'userRecipes'])->name('my.recipes');
    Route::get('/user/recipes/create', [RecipesController::class, 'create'])->name('user.recipes.create');
    Route::post('/recipes', [RecipesController::class, 'store'])->name('recipes.store');
    Route::delete('/recipes/{id}', [RecipesController::class, 'destroy'])->name('recipes.destroy');
    Route::get('/recipes/{id}/edit', [RecipesController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{id}', [RecipesController::class, 'update'])->name('recipes.update');

    // Favorites
    Route::post('/favorites/store', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/delete', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('/favorites/view', [FavoriteController::class, 'view'])->name('favorites.view');

    // Admin routes
    Route::get('/admin/users', [AdminUserController::class, 'showAllUsers'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/admin/users/recipes', [AdminUserController::class, 'showUsersRecipes'])->name('admin.users.recipes');
    Route::delete('/admin/users/recipes/{id}', [AdminUserController::class, 'destroyRecipe'])->name('admin.users.recipes.destroy');
});
