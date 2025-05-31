<x-guest-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">{{ $recipes->name }}</h1>
            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                <span>
                    <a href="{{ route('category.show', $recipes->category->id) }}">{{ $recipes->category->name }}</a>
                </span><span>By: {{ optional($recipes->user)->name }}</span>
                <span class="ml-auto">
                    @if ($favoriteRecipeIds->contains($recipes->id))
                        <svg class="inline w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 5v14l7-7 7 7V5z" />
                        </svg>
                    @else
                        <svg class="inline w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 5v14l7-7 7 7V5z" />
                        </svg>
                    @endif
                </span>
                <samp>{{ $recipes->created_at->diffForHumans() }}</samp>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <section class="md:col-span-2">
                <img src="{{ asset('images/' . $recipes->image) }}" alt="{{ $recipes->name }}"
                    class="rounded-lg w-full h-96 object-cover shadow-lg mb-6">

                <div class="prose max-w-none dark:prose-invert text-gray-800 dark:text-gray-200">
                    <h2>Description</h2>
                    <p>{{ $recipes->description }}</p>
                </div>
            </section>

            <aside class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Ingredients</h3>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    @foreach ($recipes->ingredients as $ingredient)
                        <li>
                            {{ $ingredient->name }} - {{ $ingredient->pivot->quantity }}
                            {{ $ingredient->pivot->unit }}
                        </li>
                    @endforeach
                </ul>


                <div class="mt-6 text-gray-700 dark:text-gray-300">
                    <strong>Cooking time:</strong> {{ $recipes->duration }} minutes
                </div>


                {{-- @if ($recipes->servings)
                    <div class="mt-2 text-gray-700 dark:text-gray-300">
                        <strong>Servings:</strong> {{ $recipes->servings }}
                    </div>
                @endif --}}
            </aside>
        </div>

    </div>
</x-guest-layout>
