<div class="flex flex-col justify-center items-center">
    <button
        @click="{{ $click }}"
        :class="{ 'bg-emerald-500 text-white': selectedButton ===
            {{ $size }}, 'bg-gray-200 text-gray-700': selectedButton !== {{ $size }} }"
        class="w-16 h-16 flex items-center justify-center rounded-full focus:outline-none">
        <img x-bind:src="selectedButton === {{ $size }} ? '{{ asset('images/coffee-white.png') }}' : '{{ asset('images/coffee.png') }}'" alt="Icon" height="{{ $iconSize }}" width="{{ $iconSize }}">
    </button>
    <p class="font-bold">{{ $slot }}</p>
</div>
