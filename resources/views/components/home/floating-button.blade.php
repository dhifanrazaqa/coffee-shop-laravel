<button onclick="{{ $onclick }}"
    class="flex gap-2 items-center bg-emerald-600 hover:bg-emerald-900 text-white font-bold py-2 px-4 rounded-full shadow-lg">
    <h2 class="text-2xl">{{ $slot }}</h2>
    {{ $icon }}
</button>
