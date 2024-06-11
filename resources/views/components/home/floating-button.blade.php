<button onclick="{{ $onclick }}"
    class="flex gap-2 items-center bg-app_primary hover:bg-yellow-950 text-white font-medium py-2 px-4 rounded-full shadow-lg">
    <h2 class="text-lg lg:text-2xl">{{ $slot }}</h2>
    {{ $icon }}
</button>
