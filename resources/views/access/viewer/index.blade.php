<x-app-layout>

{{-- @section('content') --}}
    <div class="flex flex-col p-2 rounded">
        <h1 class="font-bold border-b border-gray-600 flex flex-row justify-between items-center p-2 uppercase">
            Most popurlar recipes
        </h1>
    </div>
    @if (count($recipes) > 0)
        <div class="bg-gray-100 rounded dark:bg-gray-800 grid gap-2 justify-center lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 xs-grid-row p-2">
            @foreach ($recipes as $value)
                <div id="recipe-{{ $value->id }}"
                    class="relative max-w-sm border border-gray-200 bg-white border-0.5 rounded shadow-lg
                    dark:bg-gray-900 dark:border-gray-700">
                    <div class="h-48 overflow-hidden rounded-t">
                        <img class="object-cover w-full h-full " src="{{ asset('images/' . $value->image) }}" alt="" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 md:text-xl font-bold tracking-tight text-gray-900 break-all dark:text-white">
                            {{ $value->name }}
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-700 break-all dark:text-gray-400 overflow-hidden overflow-ellipsis">
                            {{ $value->description }}
                        </p>
                        {{-- <a href="{{ route('show-recipe', $value->id) }}">
                            <x-buttons.primary-button class="px-3 py-2">
                                {{ __('Read more') }}
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </x-buttons.primary-button>
                        </a> --}}
                    </div>
                </div>
            @endforeach

        </div>
        {!! $recipes->links() !!}
        @else
            <h1 class="bg-gray-200 m-2 p-2 font-semibold rounded text-center dark:bg-gray-800">
                No Data Found
            </h1>
        @endif
    {{-- <script src="{{ asset('js/bookmarks.js') }}"></script> --}}
</x-app-layout>
