<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Users and Their Recipes</h1>

        <div class="overflow-x-auto rounded-lg shadow-md bg-white dark:bg-gray-800">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">User Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Recipes</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 align-top">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 capitalize">{{ $user->role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 max-w-xs">
                                @if ($user->recipes->count())
                                    <ul class="list-disc list-inside space-y-1 max-h-48 overflow-auto">
                                        @foreach ($user->recipes as $recipe)
                                            <li class="flex justify-between items-center">
                                                <a href="{{ route('recipes.show', $recipe->id) }}" class="text-indigo-600 hover:underline">
                                                    {{ $recipe->name }}
                                                </a>
                                                <form method="POST" action="{{ route('admin.users.recipes.destroy', $recipe->id) }}" onsubmit="return confirm('Delete this recipe?');" class="ml-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-500 dark:text-gray-400">No recipes</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
