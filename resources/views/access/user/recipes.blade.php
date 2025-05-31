<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mt-6 mb-4 p-4 bg-gray-200 dark:bg-gray-800 rounded-lg shadow">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">My Recipes</h1>
            <a href="{{ route('user.recipes.create') }}" class="text-blue-600 hover:text-blue-800" title="Create Recipe">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        </div>

        @if ($recipes->count())
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($recipes as $value)
                    <div class="border border-gray-200 bg-white rounded shadow dark:bg-gray-900 dark:border-gray-700 relative">
                        <form action="{{ route('recipes.destroy', $value->id) }}" method="POST"
                            class="absolute top-2 right-2"
                            onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white rounded p-1 focus:outline-none focus:ring-2 focus:ring-red-500"
                                aria-label="Delete Recipe">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7L5 7M10 11v6m4-6v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12" />
                                </svg>
                            </button>
                        </form>
<a href="{{ route('recipes.edit', $value->id) }}"
    class="absolute top-2 right-10 bg-green-600 hover:bg-green-700 text-white rounded p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
    aria-label="Edit Recipe">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.232 5.232l3.536 3.536M9 11l6 6M4 20h7.586a1 1 0 0 0 .707-.293l9-9a1 1 0 0 0-1.414-1.414l-9 9A1 1 0 0 0 8.414 19H4v-3z" />
    </svg>
</a>

                        <div class="h-48 overflow-hidden rounded-t">
                            <img src="{{ asset('images/' . $value->image) }}" alt="Recipe Image"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white break-words">
                                {{ $value->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 line-clamp-3">
                                {{ $value->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {!! $recipes->links() !!}
            </div>
        @else
            <div class="mt-6 text-center text-gray-700 dark:text-gray-300 font-semibold">
                No recipes found.
            </div>
        @endif
    </div>
</x-app-layout>
