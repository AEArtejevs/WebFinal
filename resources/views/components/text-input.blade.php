@props(['disabled' => false])

<input 
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => '
            bg-white text-gray-900 border border-gray-300
            dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700
            focus:border-indigo-500 focus:ring-indigo-500
            dark:focus:border-indigo-600 dark:focus:ring-indigo-600
            rounded-md shadow-sm
        ']) 
    }}
>
