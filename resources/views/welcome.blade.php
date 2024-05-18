<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <h1 class="text-7xl font-bold">Coffe Shop</h1>
    </div>
    <div class="flex flex-col">
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h1 id="menu" class="text-7xl font-bold">NEW ARRIVALS</h1>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach ($posts as $post)
                        <div x-data="{ selectedButton: null }" class="group relative border-2 rounded-lg border-emerald-500 p-4">
                            <div
                                class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80">
                                <img src="{{ $post->image_url }}"
                                    alt="{{ $post->title }}"
                                    class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-black">
                                        <a href="#">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                </div>
                                <p class="text-lg font-extrabold text-emerald-700">Rp18.000</p>
                            </div>
                            <div class="flex justify-between mt-4 space-x-4">
                                <div x-data="{ test: 'hello' }">
                                    <button
                                        @click="selectedButton = updateSize(selectedButton, 1, '{{ $post->title }}')"
                                        :class="{'bg-blue-500 text-white': selectedButton === 1, 'bg-gray-200 text-gray-700': selectedButton !== 1}"
                                        class="w-10 h-10 flex items-center justify-center rounded-full focus:outline-none"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <p class="font-bold">Small</p>
                                </div>

                                <div>
                                    <button
                                        @click="selectedButton = updateSize(selectedButton, 2, '{{ $post->title }}')"
                                        :class="{'bg-blue-500 text-white': selectedButton === 2, 'bg-gray-200 text-gray-700': selectedButton !== 2}"
                                        class="w-10 h-10 flex items-center justify-center rounded-full focus:outline-none"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <p class="font-bold">Medium</p>
                                </div>

                                <div>
                                    <button
                                        @click="selectedButton = updateSize(selectedButton, 3, '{{ $post->title }}')"
                                        :class="{'bg-blue-500 text-white': selectedButton === 3, 'bg-gray-200 text-gray-700': selectedButton !== 3}"
                                        class="w-10 h-10 flex items-center justify-center rounded-full focus:outline-none"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l4-4 4 4M5 19l4-4 4 4" />
                                        </svg>
                                    </button>
                                    <p class="font-bold">Large</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- More products... -->
                </div>
            </div>
        </div>
        <p x-text="cart"></p>
    </div>
    <div id="btn-add-cart" class="hidden fixed bottom-8 right-8">
        <a href="{{ route('menu') }}" class="flex items-center bg-emerald-600 hover:bg-emerald-900 text-white font-bold py-2 px-4 rounded-full shadow-lg">
            <h2 class="text-2xl">Add To Cart</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </a>
    </div>
    <script>
        let cart = []
        const btnAddCart = document.getElementById("btn-add-cart");

        function updateSize(selectedButton, sizeType, title) {

            selectedButton = selectedButton === sizeType ? null : sizeType

            if(selectedButton === null) {
                cart = cart.filter(obj => obj.title !== title)
            } else {
                cart = [
                    {
                        'title': title,
                        'size': sizeType
                    },
                    ...cart
                ]
            }
            if(cart.length > 0) {
                btnAddCart.classList.remove("hidden");
            } else {
                btnAddCart.classList.add("hidden");
            }
            console.log(cart)
            return selectedButton
        }
    </script>
</x-app-layout>

