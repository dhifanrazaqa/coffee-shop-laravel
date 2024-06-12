@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-app_cream focus:border-app_primary focus:ring-app_primary rounded-md shadow-sm']) !!}>
