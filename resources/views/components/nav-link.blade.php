@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-app_primary text-lg text-app_primary font-bold leading-2'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-bold leading-2 text-app_primary hover:text-amber-950 hover:border-app_primary focus:outline-none focus:text-amber-950 focus:border-app_primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
