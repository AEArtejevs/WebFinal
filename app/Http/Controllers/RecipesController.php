<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        // $recipes = Recipes::where('users_id', Auth::id())->paginate(5);
        $recipes = Recipes::all();
        return view("access.viewer.home", compact('recipes'));
    }
    public function showRecipesByCategories()
    {
        // $recipes = Recipes::where('users_id', Auth::id())->paginate(5);
        $recipes = Recipes::all();
        return view("access.viewer.home", compact('recipes'));
    }
    public function userRecipes()
    {
        $recipes = Recipes::where('user_id', Auth::id())->get();
        return view("access.user.recipes", compact('recipes'));
    }


    public function index()
    {
        // $recipes = Recipes::where('users_id', Auth::id())->paginate(5);
        $recipes = Recipes::all();
        return view("recipe-CRUD.index", compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipes)
    {
        //
    }
}
