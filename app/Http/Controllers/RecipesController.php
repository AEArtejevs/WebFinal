<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\Ingredients;
use App\Models\Category;
use App\Models\IngredientsRecipes;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        $recipes = Recipes::paginate(10);
        return view('access.viewer.home', compact('recipes'));
    }
    public function recipesByCategory($categoryId)
    {
        $favoriteRecipeIds = Favorite::where('user_id', Auth::id())->pluck('recipe_id');
        $recipes = Recipes::where('category_id', $categoryId)->paginate(10);
        $category = Category::findOrFail($categoryId);
        return view('access.viewer.categories', compact('recipes', 'category', 'favoriteRecipeIds'));
    }
    public function userRecipes()
    {
        $recipes = Recipes::where('user_id', Auth::id())->paginate(10);
        return view("access.user.recipes", compact('recipes'));
    }


    public function index(Request $request)
    {
        $favoriteRecipeIds = Favorite::where('user_id', Auth::id())->pluck('recipe_id');
        $search = $request->input('search');

        $recipes = Recipes::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view("access.viewer.index", compact('recipes', 'favoriteRecipeIds'));
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

        return redirect()->route('my.recipes')->with('success', 'Recipe created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipes = Recipes::with(['category', 'user', 'ingredients'])->findOrFail($id);
        $favoriteRecipeIds = Favorite::where('user_id', Auth::id())->pluck('recipe_id');
        return view('access.viewer.show', compact('recipes', 'favoriteRecipeIds'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $recipes = Recipes::with(['ingredients', 'category'])->findOrFail($id);

        $ingredients = Ingredients::all();
        $categories = Category::all();

        return view('access.user.edit', compact('recipes', 'ingredients', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recipes = Recipes::findOrFail($id);

        // Validate the request
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'instructions' => 'required|string',
    //         'duration' => 'required|integer',
    //         'category_id' => 'required|exists:categories,id',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
    //     ]);
    // {


        // handle image upload and deletion if needed
        if ($request->hasFile('image')) {
            $oldImage = public_path('images/' . $recipes->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $file_name);
            $recipes->image = $file_name;
        }

        // update other fields
        $recipes->name = $request->name;
        $recipes->description = $request->description;
        $recipes->instructions = $request->instructions;
        $recipes->duration = $request->duration;
        $recipes->category_id = $request->category_id;

        // do NOT change user_id here, preserve original owner

        $recipes->save();

        // sync ingredients pivot
        $ingredientsInput = $request->ingredients ?? [];

        $syncData = [];
        foreach ($ingredientsInput as $ingredient_id => $ingredient_data) {
            if (isset($ingredient_data['selected']) && $ingredient_data['selected']) {
                $syncData[$ingredient_id] = [
                    'quantity' => $ingredient_data['quantity'] ?? null,
                    'unit' => $ingredient_data['unit'] ?? null,
                ];
            }
        }
        $recipes->ingredients()->sync($syncData);

        return redirect()->route('my.recipes')->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipes::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $recipe->delete();
        return redirect()->route('my.recipes')->with('success', 'Recipe deleted successfully.');
    }
}
