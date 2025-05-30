<x-guest-layout>
    <div class="flex flex-col p-2 rounded">
        <h1 class="font-bold border-b border-gray-600 flex flex-row justify-between items-center p-2 uppercase">
            Recipes in Category: {{ $category->name }}
        </h1>
    </div>

    @if ($recipes->count() > 0)
        <div class="bg-gray-100 rounded dark:bg-gray-800 grid gap-2 justify-center lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 xs-grid-row p-2">
            @foreach ($recipes as $recipe)
                <div id="recipe-{{ $recipe->id }}"
                    class="relative max-w-sm border border-gray-200 bg-white border-0.5 rounded shadow-lg dark:bg-gray-900 dark:border-gray-700">
                    <div class="h-48 overflow-hidden rounded-t">
                        <img class="object-cover w-full h-full" src="{{ asset('images/' . $recipe->image) }}" alt="{{ $recipe->name }}" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 md:text-xl font-bold tracking-tight text-gray-900 break-all dark:text-white">
                            {{ $recipe->name }}
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-700 break-all dark:text-gray-400 overflow-hidden overflow-ellipsis">
                            {{ $recipe->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {!! $recipes->links() !!}
        </div>
    @else
        <h1 class="bg-gray-200 m-2 p-2 font-semibold rounded text-center dark:bg-gray-800">
            No recipes found in this category.
        </h1>
    @endif
</x-guest-layout>
