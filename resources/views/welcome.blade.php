<x-app-layout>
    {{-- Header --}}
    @include('home.landing')

    {{-- Body --}}
    <div class="flex flex-col z-10">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="bg-white">
            <div class="flex flex-col mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h1 id="menu" class="text-7xl font-bold">NEW ARRIVALS</h1>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                    @foreach ($products as $product)
                        <x-card>
                            <x-slot name="image_url">
                                {{ $product->image_url }}
                            </x-slot>
                            <x-slot name="price">
                                {{ $product->price }}
                            </x-slot>
                            <x-slot name="title">
                                {{ $product->title }}
                            </x-slot>
                            <x-slot name="id">
                                {{ $product->id }}
                            </x-slot>
                        </x-card>
                    @endforeach
                </div>
                <div class="flex mt-12 justify-center">
                    <a href="/menu"
                        class="flex justify-center w-52 bg-emerald-600 hover:bg-emerald-900 text-white font-bold py-2 px-4 rounded-full shadow-lg">
                        <h2 class="text-2xl">See All</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="btn-add-cart" class="hidden fixed bottom-8 right-8">
        <x-home.floating-button onclick="addToCart()">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
            </x-slot>
            Add To Cart
        </x-home.floating-button>
    </div>
    <div class="fixed bottom-8 left-8">
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
