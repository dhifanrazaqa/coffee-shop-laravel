<x-app-layout>
    <div class="flex flex-col">
        <div>
            <div class="flex flex-col mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="flex flex-col md:flex-row justify-between">
                    <h1 id="menu" class="text-7xl text-app_primary font-bold">New Arrivals</h1>

                    {{-- Category --}}
                    <div class="flex justify-between mt-4 space-x-4">
                        <div class="flex flex-col justify-center items-center">
                            <a href="/menu"
                                class="{{ request()->routeIs('menu')
                                    ? 'bg-app_primary text-white w-10 h-10 flex items-center justify-center rounded-full focus:outline-none'
                                    : 'bg-gray-200 text-gray-700 w-10 h-10 flex items-center justify-center rounded-full focus:outline-none' }}">
                                <img src="{{ asset('images/all.png') }}" class="w-6 h-6">
                            </a>
                            <p class="font-bold">All</p>
                        </div>
                        @foreach ($categories as $category)
                            <div class="flex flex-col justify-center items-center">
                                <a href="/menu/{{ $category->title }}"
                                    class="{{ last(request()->segments()) === $category->title
                                        ? 'bg-app_primary text-white w-10 h-10 flex items-center justify-center rounded-full focus:outline-none'
                                        : 'bg-gray-200 text-gray-700 w-10 h-10 flex items-center justify-center rounded-full focus:outline-none' }}">
                                    @if ($category->title == 'Coffee')
                                        <img src="{{ asset('images/coffee_ic.png') }}" class="w-6 h-6">
                                    @elseif($category->title == 'Non-Coffee')
                                        <img src="{{ asset('images/non-coffee.png') }}" class="w-6 h-6">
                                    @elseif($category->title == 'Bakery')
                                        <img src="{{ asset('images/bakery.png') }}" class="w-6 h-6">
                                    @elseif($category->title == 'Ice Cream')
                                        <img src="{{ asset('images/ice-cream.png') }}" class="w-6 h-6">
                                    @endif
                                </a>
                                <p class="font-bold text-xs">{{ $category->title }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach ($products as $product)
                        <x-card>
                            <x-slot name="image_url">
                                {{ $product->image_url }}
                            </x-slot>
                            <x-slot name="price">
                                {{ number_format($product->price, 2, ',', '.') }}
                            </x-slot>
                            <x-slot name="title">
                                {{ $product->title }}
                            </x-slot>
                            <x-slot name="description">
                                {{ $product->description }}
                            </x-slot>
                            <x-slot name="id">
                                {{ $product->id }}
                            </x-slot>
                        </x-card>
                    @endforeach
                </div>
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
    <div id="btn-add-cart" class="hidden fixed bottom-4 md:bottom-8 right-4 md:right-8">
        <button onclick="addToCart()"
            class="flex items-center bg-app_primary hover:bg-yellow-950 text-white font-medium py-2 px-3 rounded-full shadow-lg">
            <h2 class="text-lg lg:text-2xl">Add To Cart</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-10 w-5 md:w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
        </button>
    </div>
    <div class="fixed bottom-4 md:bottom-8 left-4 md:left-8">
        <x-home.floating-button onclick="goToOrder()">
            <x-slot name="icon">
                <img src="{{ asset('images/shopping-cart.png') }}" alt="Cart Icon" width="30" height="30">
            </x-slot>
            Cart
        </x-home.floating-button>
    </div>
    <script>
        let cart = []
        const btnAddCart = document.getElementById("btn-add-cart");

        function goToOrder() {
            window.location.href = "/order";
        }

        function resetSelected() {
            document.querySelectorAll('[x-data]').forEach(function(element) {
                element._x_dataStack[0].selectedButton = null
            });
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function updateSize(selectedButton, sizeType, id) {

            selectedButton = selectedButton === sizeType ? null : sizeType

            if (selectedButton === null) {
                cart = cart.filter(obj => obj.id !== id)
            } else {
                const newData = {
                    'id': id,
                    'size': sizeType,
                    'qty': 1
                };
                const index = cart.findIndex(item => item.id === newData.id);
                if (index !== -1) {
                    cart[index] = newData;
                } else {
                    cart.push(newData);
                }
            }
            if (cart.length > 0) {
                btnAddCart.classList.remove("hidden");
            } else {
                btnAddCart.classList.add("hidden");
            }

            return selectedButton
        }

        function addToCart() {
            let cookieCart = getCookie("cart");
            cookieCart = JSON.parse(cookieCart);

            if (!cookieCart) {
                cookieCart = []
            }

            cart.forEach(element => {
                addObject(element, cookieCart)
            })

            const cartString = JSON.stringify(cookieCart);
            setCookie("cart", cartString, 7);
            btnAddCart.classList.add("hidden");
            cart = []
            resetSelected()
        }

        function showCookieValue() {
            let cartString = getCookie("cart");
            console.log(JSON.parse(cartString))
        }

        function addObject(obj, cookieCart) {
            let found = false;

            for (let i = 0; i < cookieCart.length; i++) {
                if (cookieCart[i].id === obj.id && cookieCart[i].size === obj.size) {
                    cookieCart[i].qty++;
                    found = true;
                    break;
                }
            }

            if (!found) {
                cookieCart.push(obj);
            }
        }
    </script>
</x-app-layout>
