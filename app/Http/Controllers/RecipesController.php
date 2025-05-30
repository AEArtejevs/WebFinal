<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\Ingredients;
use App\Models\Category;
use App\Models\IngredientsRecipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ddt\DumpServer\Facades\DumpServer;


class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        // $recipes = Recipes::where('users_id', Auth::id())->paginate(5);
        $recipes = Recipes::paginate(10);
        return view("access.viewer.home", compact('recipes'));
    }
    public function recipesByCategory($categoryId)
    {
        $recipes = Recipes::where('category_id', $categoryId)->paginate(10);
        $category = Category::findOrFail($categoryId);
        return view('access.viewer.categories', compact('recipes', 'category'));
    }
    public function userRecipes()
    {
        $recipes = Recipes::where('user_id', Auth::id())->paginate(10);
        return view("access.user.recipes", compact('recipes'));
    }


    public function index()
    {
        // $recipes = Recipes::where('users_id', Auth::id())->paginate(5);
        $recipes = Recipes::paginate(10);
        return view("access.viewer.index", compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipes = Recipes::all();
        $ingredients = Ingredients::all();
        $categories = Category::all();

        return view("access.user.create", compact('recipes', 'ingredients', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $ingredients = $request->ingredients;
        $quantities = $request->quantity;
        $units = $request->unit;

        // Handle image upload
        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $file_name);

        // Save recipe with instructions stored directly
        $recipe = new Recipes;
        $recipe->name = $request->name;
        $recipe->description = $request->description;
        $recipe->instructions = $request->instructions;  // store directly here
        $recipe->duration = $request->duration;
        $recipe->image = $file_name;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = Auth::id();
        $recipe->save();

        // Attach ingredients with quantity and unit
        $ingredients = $request->ingredients ?? [];

        // Recipe saving here...

        foreach ($ingredients as $ingredient_id => $ingredient_data) {
            if (isset($ingredient_data['selected']) && $ingredient_data['selected']) {
                IngredientsRecipes::create([
                    'ingredient_id' => $ingredient_id,
                    'recipe_id' => $recipe->id,
                    'quantity' => $ingredient_data['quantity'] ?? null,
                    'unit' => $ingredient_data['unit'] ?? null,
                ]);
            }
        }
        // return $request->dd();

        return redirect()->route('user.recipes')->with('success', 'Recipe created successfully!');
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
    public function destroy($id)
    {
        $recipe = Recipes::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $recipe->delete();
        return redirect()->route('user.recipes')->with('success', 'Recipe deleted successfully.');
    }
}
