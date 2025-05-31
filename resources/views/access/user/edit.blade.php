<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded shadow p-6 my-10 ">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Edit Recipe</h2>

        <form method="POST" action="{{ route('recipes.update', $recipes->id) }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="name" value="Recipe Name" />
                <x-text-input id="name" name="name" type="text" class="w-full mt-2"
                    value="{{ old('name', $recipes->name) }}" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="duration" value="Duration (minutes)" />
                    <x-text-input id="duration" name="duration" type="number" min="1" class="w-full mt-2"
                        value="{{ old('duration', $recipes->duration) }}" required />
                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="category_id" value="Category" />
                    <select id="category_id" name="category_id"
                        class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required>
                        <option value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $recipes->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="description" value="Description" />
                <textarea id="description" name="description" rows="4"
                    class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-200 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    required>{{ old('description', $recipes->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="instructions" value="Instructions" />
                <textarea id="instructions" name="instructions" rows="4"
                    class="w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    required>{{ old('instructions', $recipes->instructions) }}</textarea>
            </div>

            <div>
                <x-input-label for="current_image" value="Current Recipe Image" />
                <img src="{{ asset('images/' . $recipes->image) }}" alt="Current Image"
                    class="w-48 h-auto rounded mt-2 mb-4" />
            </div>

            <div>
                <x-input-label for="image" value="Recipe Image" />
                <input id="image" name="image" type="file"
                    class="w-full mt-2 block text-sm text-gray-500 dark:text-gray-400
               file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0
               file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                    accept="image/*" />
                <small class="text-gray-500 dark:text-gray-400">Leave blank to keep existing image.</small>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div>
                <x-input-label value="Ingredients" class="mb-2" />

                <div class="relative mb-3">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text"
                        class="block w-full ps-10 p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                        placeholder="Search (not functional)">
                </div>

                <div
                    class="h-64 overflow-y-auto space-y-3 px-2 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md">
                    @foreach ($ingredients as $ingredient)
                        @php
                            $hasIngredient = $recipes->ingredients->contains('id', $ingredient->id);
                            $pivotData = $hasIngredient ? $recipes->ingredients->find($ingredient->id)->pivot : null;
                        @endphp
                        <label for="ingredient-{{ $ingredient->id }}"
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0 p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer">
                            <div class="flex items-center space-x-2">
                                <input id="ingredient-{{ $ingredient->id }}" type="checkbox"
                                    name="ingredients[{{ $ingredient->id }}][selected]" value="1"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:bg-gray-600 dark:border-gray-500"
                                    {{ $hasIngredient ? 'checked' : '' }}>
                                <span
                                    class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ $ingredient->name }}</span>
                            </div>

                            <div class="flex space-x-2 w-full sm:w-auto">
                                <input type="number" step="any" min="0"
                                    name="ingredients[{{ $ingredient->id }}][quantity]" placeholder="Qty"
                                    class="w-20 px-2 py-1 text-sm border rounded-md dark:bg-gray-900 dark:border-gray-700 dark:text-white"
                                    value="{{ old('ingredients.' . $ingredient->id . '.quantity', $pivotData->quantity ?? '') }}">
                                <input type="text" name="ingredients[{{ $ingredient->id }}][unit]"
                                    placeholder="Unit"
                                    class="w-20 px-2 py-1 text-sm border rounded-md dark:bg-gray-900 dark:border-gray-700 dark:text-white"
                                    value="{{ old('ingredients.' . $ingredient->id . '.unit', $pivotData->unit ?? '') }}">
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <x-primary-button class="w-full justify-center">Update Recipe</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
