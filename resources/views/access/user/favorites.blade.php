<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mt-6 mb-4 p-4 bg-gray-200 dark:bg-gray-800 rounded-lg shadow">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">My Favorite Recipes</h1>
        </div>

        @if ($favorites->count())
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($favorites as $favorite)
                    @php
                        $recipe = $favorite->recipe;
                    @endphp
                    <div
                        class="border border-gray-200 bg-white rounded shadow dark:bg-gray-900 dark:border-gray-700 relative">
                        <div class="h-48 overflow-hidden rounded-t">
                            <img src="{{ asset('images/' . $recipe->image) }}" alt="{{ $recipe->name }}"
                                class="w-full h-full object-cover" />
                        </div>

                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white break-words">
                                {{ $recipe->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 line-clamp-3">
                                {{ $recipe->description }}
                            </p>
                        </div>


                        <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST"
                            class="absolute top-2 right-2"
                            onsubmit="return confirm('Remove this recipe from favorites?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white rounded p-1 focus:outline-none focus:ring-2 focus:ring-red-500"
                                aria-label="Remove Favorite">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

         
            <div class="mt-6">
                {!! $favorites->links() !!}
            </div>
        @else
            <div class="mt-6 text-center text-gray-700 dark:text-gray-300 font-semibold">
                You have no favorite recipes yet.
            </div>
        @endif
    </div>
</x-app-layout>
