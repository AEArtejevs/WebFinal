<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col rounded my-3">
            <h1 class="font-bold border-b border-gray-600 flex flex-row justify-between items-center py-2 uppercase">
                Most Popular Recipes
            </h1>
        </div>

        @if ($recipes->count())
            <div
                class="bg-white rounded dark:bg-gray-800 grid gap-2 justify-center lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 xs-grid-row p-2">
                @foreach ($recipes as $recipe)
                    <div
                        class="border border-gray-200 bg-white rounded shadow dark:bg-gray-900 dark:border-gray-700 relative max-w-sm">
                        <form method="POST" action="{{ route('favorites.store') }}" class="absolute top-2 right-2">
                            @csrf
                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                            <button type="submit"
                                class="p-1 rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                aria-label="Bookmark Recipe" title="Bookmark Recipe">
                                @if ($favoriteRecipeIds->contains($recipe->id))
                                    <!-- Filled bookmark icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600"
                                        fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                        <path d="M5 5v14l7-7 7 7V5z" />
                                    </svg>
                                @else
                                    <!-- Hollow bookmark icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5v14l7-7 7 7V5z" />
                                    </svg>
                                @endif
                            </button>
                        </form>


                        <div class="h-48 overflow-hidden rounded-t">
                            <img src="{{ asset('images/' . $recipe->image) }}" alt="Recipe Image"
                                class="w-full h-full object-cover" />
                        </div>

                        <div class="p-5">
                            <h5
                                class="mb-2 md:text-xl font-bold tracking-tight text-gray-900 break-all dark:text-white">
                                {{ $recipe->name }}
                            </h5>
                            <p
                                class="mb-3 font-normal text-xs text-gray-700 break-all dark:text-gray-400 overflow-hidden overflow-ellipsis">
                                {{ $recipe->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {!! $recipes->links() !!}
            </div>
        @else
            <div class="mt-6 text-center text-gray-700 dark:text-gray-300 font-semibold">
                No recipes found.
            </div>
        @endif
    </div>
</x-guest-layout>
