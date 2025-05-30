<?php

use App\Http\Controllers\RecipesController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [RecipesController::class, 'home'])->name('home');
Route::get('/recipes', [RecipesController::class, 'index'])->name('recipes.index');

Route::get('/my-recipes', [RecipesController::class, 'userRecipes'])->name('recipes.my');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login');
Route::get('/register', [CustomRegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [CustomRegisterController::class, 'register'])->name('register');
// Route::middleware('auth')->group(function () {
//     Route::get('/recipes/user/', [RecipesController::class, 'showUserRecipes'])->name('recipes.user');

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
