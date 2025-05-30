<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller {

    public function view()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('recipe')->paginate(10);
        return view('access.user.favorites', compact('favorites'));
    }
    public function store(Request $request)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'recipe_id' => $request->recipe_id,
        ]);
        return back()->with('success', 'Recipe bookmarked.');
    }
    public function destroy(Request $request)
    {
        Favorite::where('user_id', Auth::id())->where('recipe_id', $request->recipe_id)->delete();
        return back()->with('success', 'Bookmark removed.');
    }
}
