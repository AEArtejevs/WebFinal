<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Recipes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showAllUsers()
    {

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $users = User::where('role', 'user')->get();
        return view('access.admin.showAllUsers', compact('users'));
    }
    public function showUsersRecipes()
    {

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        $users = User::with('recipes')->where('role', 'user')->get();
        return view('access.admin.showUsersRecipes', compact('users'));
    }

    public function destroyUser(string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
    public function destroyRecipe($id)
    {
        $recipe = Recipes::findOrFail($id);
        $recipe->delete();

        return redirect()->route('admin.users.recipes')->with('success', 'Recipe deleted successfully.');
    }
}
