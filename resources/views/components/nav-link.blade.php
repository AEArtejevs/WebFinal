@props(['active'])

@php
$classes = $active
    ? 'flex items-center p-2 text-gray-900 bg-gray-100 dark:text-white dark:bg-gray-700 rounded-lg group'
    : 'flex items-center p-2 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg group';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
