<div x-data="{ selectedButton: null }" class="group relative border-2 rounded-lg border-app_primary p-4">
    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80">
        <img src="{{ $image_url }}" alt="{{ $title }}"
            class="h-full w-full rounded-lg object-cover object-center lg:h-full lg:w-full">
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-lg font-bold text-app_primary">
                {{ $title }}
            </h3>
        </div>
        <p class="text-lg font-extrabold text-emerald-700">Rp{{ $price }}</p>
    </div>
    <div class="w-full my-4">
        <p class="text-md font-normal">{{ Str::limit($description, 70, '...') }}</p>
    </div>
    <div class="flex justify-between mt-4 space-x-4">
        <x-home.circle-button>
            <x-slot name="click">
                selectedButton = updateSize(selectedButton, 1, '{{ $id }}')
            </x-slot>
            <x-slot name="size">
                1
            </x-slot>
            <x-slot name="iconSize">
                20
            </x-slot>
            Small
        </x-home.circle-button>

        <x-home.circle-button>
            <x-slot name="click">
                selectedButton = updateSize(selectedButton, 2, '{{ $id }}')
            </x-slot>
            <x-slot name="size">
                2
            </x-slot>
            <x-slot name="iconSize">
                25
            </x-slot>
            Medium
        </x-home.circle-button>

        <x-home.circle-button>
            <x-slot name="click">
                selectedButton = updateSize(selectedButton, 3, '{{ $id }}')
            </x-slot>
            <x-slot name="size">
                3
            </x-slot>
            <x-slot name="iconSize">
                30
            </x-slot>
            Large
        </x-home.circle-button>
    </div>
</div>
