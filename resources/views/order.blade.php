<x-app-layout>
    <div x-cloak x-data="walletModal()">
        <div class="flex flex-col">
            @if (count($carts) === 0)
                <div class="h-screen flex p-0 flex-col justify-center items-center gap-5">
                    <img class="h-72" object-contain" src="{{ asset('images/empty-cart.png') }}" alt="background">
                    <a href="{{ route('menu') }}"
                        class="flex items-center w-64 h-10 justify-center rounded-md border border-transparent bg-app_primary text-base font-semibold text-white">Start
                        Shopping</a>
                </div>
            @else
                <div>
                    @if (session('error'))
                        <div class="mt-6 p-4 max-w-2xl mx-auto lg:max-w-7xl bg-red-500 text-white rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-4 p-4 max-w-2xl mx-auto lg:max-w-7xl bg-red-500 text-white rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div
                        class="grid grid-cols-1 md:grid-cols-8 gap-8 mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="col-span-4">
                            <div class="border-2 rounded-lg p-6 border-app_primary">
                                <div class="flow-root">
                                    <h2 class="font-medium text-2xl mb-2">Cart</h2>
                                    <ul id="cart-list" role="list" class="-my-6 divide-y divide-gray-200">
                                        @foreach ($carts as $cart)
                                            <li data-id="{{ $cart->id }}-{{ $cart->size }}" class="flex py-6">
                                                <div
                                                    class="h-36 w-40 flex-shrink-0 overflow-hidden rounded-xl border border-gray-200">
                                                    <img src="{{ $cart->image_url }}" alt="{{ $cart->title }}"
                                                        class="h-full w-full object-cover object-center">
                                                </div>
                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div
                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3 class="font-bold text-app_primary">
                                                                {{ $cart->title }}
                                                            </h3>
                                                            <div class="flex">
                                                                <button type="button"
                                                                    onclick="deleteCart({{ $cart->id }}, {{ $cart->size }})"
                                                                    class="w-5 h-5">
                                                                    <svg viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <path
                                                                                d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17"
                                                                                stroke="#4A2E2C" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $cart->size == 1 ? 'Small' : ($cart->size == 2 ? 'Medium' : ($cart->size == 3 ? 'Large' : 'Invalid size')) }}
                                                        </p>
                                                        <h3 class="font-semibold text-green-600">
                                                            Rp{{ number_format($cart->price, 2, ',', '.') }}
                                                        </h3>
                                                    </div>
                                                    <div
                                                        class="flex flex-1 items-end justify-end text-sm border-b-2 border-app_primary">
                                                        <div x-data="{ currentVal: {{ $cart->qty }}, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
                                                            <div @dblclick.prevent class="flex items-center">
                                                                <button class="h-5 w-5"
                                                                    @click="currentVal = updatePrice({{ $cart->id }}, {{ $cart->size }}, currentVal, Math.max(minVal, currentVal - incrementAmount), 'substract')"
                                                                    aria-label="subtract">
                                                                    <svg viewBox="0 0 32 32" version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                                                        fill="#4A2E2C">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <title>minus-square</title>
                                                                            <desc>Created with Sketch Beta.</desc>
                                                                            <defs> </defs>
                                                                            <g id="Page-1" stroke="none"
                                                                                stroke-width="1" fill="none"
                                                                                fill-rule="evenodd"
                                                                                sketch:type="MSPage">
                                                                                <g id="Icon-Set"
                                                                                    sketch:type="MSLayerGroup"
                                                                                    transform="translate(-152.000000, -1035.000000)"
                                                                                    fill="#4A2E2C">
                                                                                    <path
                                                                                        d="M174,1050 L162,1050 C161.448,1050 161,1050.45 161,1051 C161,1051.55 161.448,1052 162,1052 L174,1052 C174.552,1052 175,1051.55 175,1051 C175,1050.45 174.552,1050 174,1050 L174,1050 Z M182,1063 C182,1064.1 181.104,1065 180,1065 L156,1065 C154.896,1065 154,1064.1 154,1063 L154,1039 C154,1037.9 154.896,1037 156,1037 L180,1037 C181.104,1037 182,1037.9 182,1039 L182,1063 L182,1063 Z M180,1035 L156,1035 C153.791,1035 152,1036.79 152,1039 L152,1063 C152,1065.21 153.791,1067 156,1067 L180,1067 C182.209,1067 184,1065.21 184,1063 L184,1039 C184,1036.79 182.209,1035 180,1035 L180,1035 Z"
                                                                                        id="minus-square"
                                                                                        sketch:type="MSShapeGroup">
                                                                                    </path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                                <input x-model="currentVal.toFixed(decimalPoints)"
                                                                    id="counterInput-{{ $cart->id }}"
                                                                    type="text"
                                                                    class="border-none h-10 w-16 bg-app_cream text-center"
                                                                    readonly />
                                                                <button class="h-5 w-5"
                                                                    @click="currentVal = updatePrice({{ $cart->id }}, {{ $cart->size }}, currentVal, Math.min(maxVal, currentVal + incrementAmount), 'add')"
                                                                    aria-label="add">
                                                                    <svg viewBox="0 0 32 32" version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                                                        fill="#4A2E2C">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <title>plus-square</title>
                                                                            <desc>Created with Sketch Beta.</desc>
                                                                            <defs> </defs>
                                                                            <g id="Page-1" stroke="none"
                                                                                stroke-width="1" fill="none"
                                                                                fill-rule="evenodd"
                                                                                sketch:type="MSPage">
                                                                                <g id="Icon-Set"
                                                                                    sketch:type="MSLayerGroup"
                                                                                    transform="translate(-100.000000, -1035.000000)"
                                                                                    fill="#4A2E2C">
                                                                                    <path
                                                                                        d="M130,1063 C130,1064.1 129.104,1065 128,1065 L104,1065 C102.896,1065 102,1064.1 102,1063 L102,1039 C102,1037.9 102.896,1037 104,1037 L128,1037 C129.104,1037 130,1037.9 130,1039 L130,1063 L130,1063 Z M128,1035 L104,1035 C101.791,1035 100,1036.79 100,1039 L100,1063 C100,1065.21 101.791,1067 104,1067 L128,1067 C130.209,1067 132,1065.21 132,1063 L132,1039 C132,1036.79 130.209,1035 128,1035 L128,1035 Z M122,1050 L117,1050 L117,1045 C117,1044.45 116.552,1044 116,1044 C115.448,1044 115,1044.45 115,1045 L115,1050 L110,1050 C109.448,1050 109,1050.45 109,1051 C109,1051.55 109.448,1052 110,1052 L115,1052 L115,1057 C115,1057.55 115.448,1058 116,1058 C116.552,1058 117,1057.55 117,1057 L117,1052 L122,1052 C122.552,1052 123,1051.55 123,1051 C123,1050.45 122.552,1050 122,1050 L122,1050 Z"
                                                                                        id="plus-square"
                                                                                        sketch:type="MSShapeGroup">
                                                                                    </path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4">
                            {{-- <form action="{{ route('order.store') }}" method="POST">
                                @csrf --}}
                            <div class="border-2 rounded-lg p-6 border-app_primary">
                                <h2 class="font-medium text-2xl mb-2">Payment Method</h2>
                                @if (isset($balance))
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <div class="flex flex-col">
                                            <h2 class="text-xl">In-App Payment</h2>
                                            <p>Total Balance</p>
                                        </div>
                                        <div class="flex flex-col justify-between items-end">
                                            <a href="{{ route('balance.show') }}"
                                                class="text-base hover:underline text-blue-500 hover:cursor-pointer">Top-Up</a>
                                            <p class="font-semibold text-green-600">Rp{{ $balance }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex justify-between">
                                        <h2>You're not logged in</h2>
                                        <a href="{{ route('login') }}" type="submit"
                                            class="flex items-center w-32 justify-center rounded-md border border-transparent bg-app_primary text-base font-semibold text-white">Login</a>
                                    </div>
                                @endif
                            </div>
                            <div class="border-2 rounded-lg p-6 border-app_primary mt-6">
                                <h2 class="font-medium text-2xl mb-2">Payment Details</h2>
                                <ul id="detail-list">
                                    @foreach ($carts as $cart)
                                        <li class="py-1" data-id="detail-{{ $cart->id }}-{{ $cart->size }}">
                                            <div class="flex justify-between">
                                                <div class="flex gap-2">
                                                    <p id="detailTitle" class="font-medium">
                                                        {{ $cart->title }} x {{ $cart->qty }}</p>
                                                    <p id="detailSize" class="font-medium">
                                                        ({{ $cart->size == 1 ? 'Small' : ($cart->size == 2 ? 'Medium' : ($cart->size == 3 ? 'Large' : 'Invalid size')) }})
                                                    </p>
                                                </div>
                                                <div>
                                                    <p id="detailPrice" class="font-medium">
                                                        Rp{{ $cart->price * $cart->qty }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <div class="border-t-2 border-app_primary mt-2 py-2">
                                        <div class="flex justify-between">
                                            <h2 class="font-medium text-lg">Total Payment</h2>
                                            <p id="totalPrice1" class="font-semibold">
                                                Rp{{ $totalPrice }}</p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <div class="border-y-2 p-6 border-app_primary mt-6 flex justify-between">
                                <div class="flex flex-col">
                                    <h2 class="font-medium text-lg">Total Payment</h2>
                                    <p id="totalPrice" class="text-green-600 font-semibold">
                                        Rp{{ $totalPrice }}</p>
                                    <input id="totalPriceInput" type="hidden" name="total_price"
                                        value="{{ $totalPrice }}">
                                </div>
                                @if (Auth::check())
                                    <button @click="showModal = true"
                                        class="flex items-center w-32 justify-center rounded-md border border-transparent bg-app_primary text-xl font-semibold text-white">Pay</button>
                                @else
                                    <div class="flex justify-between">
                                        <a href="{{ route('login') }}" type="submit"
                                            class="flex items-center w-32 justify-center rounded-md border border-transparent bg-app_primary text-base font-semibold text-white">Login</a>
                                    </div>
                                @endif
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div>
            <!-- Modal -->
            <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
                <div class="bg-app_cream p-4 rounded border-2 border-app_primary shadow-lg max-w-sm w-full">
                    <div x-show="showPassword">
                        <h2 class="text-xl font-semibold mb-4">Confirm Your Password</h2>
                        <template x-if="errorMessage">
                            <p class="text-red-500 mb-4" x-text="errorMessage"></p>
                        </template>
                        <input type="password" x-model="password" placeholder="Enter your password"
                            class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded">
                        <div class="flex justify-end space-x-2 mt-4">
                            <button @click="showModal = false"
                                class="text-app_primary px-3 py-2 mr-4 text-xs font-semibold rounded-full border-2 border-app_primary">Cancel</button>
                            <button @click="confirmPassword"
                                class="bg-app_primary text-white px-3 py-2 text-xs font-semibold rounded-full">Confirm</button>
                        </div>
                    </div>
                    <div x-show="showConfirm">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <h2 class="text-xl font-semibold mb-4">Confirm Your Payment</h2>
                            <div class="flex justify-between">
                                <h2 class="font-medium text-lg">Total Payment</h2>
                                <p id="confirmTotalPrice" class="text-green-600 font-semibold">
                                    Rp{{ $totalPrice }}</p>
                                <input id="confirmTotalPriceInput" type="hidden" name="total_price"
                                    value="{{ $totalPrice }}">
                            </div>
                            <div class="flex justify-end space-x-2 mt-4">
                                <button @click="showModal = false" type="reset"
                                    class="text-app_primary px-3 py-2 mr-4 text-xs font-semibold rounded-full border-2 border-app_primary">Cancel</button>
                                <button type="submit"
                                    class="bg-app_primary text-white px-3 py-2 text-xs font-semibold rounded-full">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function walletModal() {
            return {
                showModal: false,
                showPassword: true,
                showConfirm: false,
                password: '',
                errorMessage: '',
                confirmPassword() {
                    if (this.password === '') {
                        this.errorMessage = 'Password cannot be empty';
                        return;
                    }
                    fetch('/confirm-password', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content')
                            },
                            body: JSON.stringify({
                                password: this.password
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Password incorrect');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                const totalPriceinputElement = document.getElementById('totalPriceInput');

                                const confirmTotalPriceElement = document.getElementById('confirmTotalPrice');
                                const confirmTotalPriceInputElement = document.getElementById('confirmTotalPriceInput');
                                
                                confirmTotalPriceElement.innerHTML = 'Rp' + totalPriceinputElement.value;
                                confirmTotalPriceInputElement.value = totalPriceinputElement.value;
                            } else {
                                this.errorMessage = 'Password incorrect';
                            }
                            this.showConfirm = true;
                            this.showPassword = false;
                            this.password = '';
                        })
                        .catch(error => {
                            this.errorMessage = error.message;
                        });
                }
            };
        }
    </script>

    @include('home.footer')
    <script>
        let carts = @json($carts);
        let cookieCart = getCookie("cart");
        cookieCart = JSON.parse(cookieCart);

        carts = carts.filter(item => item.qty != 0)
        cookieCart = cookieCart.filter(item => item.qty != 0)

        function deleteCart(id, size) {
            carts = carts.filter(item => item.size !== size || parseInt(item.id) !== id);

            const cartList = document.getElementById('cart-list');
            const cartItem = cartList.querySelector(`li[data-id='${id}-${size}']`);
            if (cartItem) {
                cartList.removeChild(cartItem);
            }

            const totalPriceElement = document.getElementById('totalPrice');
            let totalPrice = 0
            carts.forEach(cart => {
                totalPrice += cart.price * cart.qty
            });
            totalPriceElement.innerHTML = 'Rp' + totalPrice

            addToCart();

            console.log("Updated Data:", carts);
        }

        function updatePrice(id, size, currentVal, operation, type) {
            let price = 0;
            let newVal = currentVal
            if ((currentVal > 0 && currentVal < 10) || (currentVal == 0 && type === 'add') || (currentVal == 10 && type ===
                    'substract')) {
                carts.map(cart => {
                    if (cart.id == id && cart.size == size) {
                        cart.qty = type === 'add' ? cart.qty + 1 : cart.qty - 1
                        price = cart.price
                    }
                })
                newVal = operation

                const detailList = document.getElementById('detail-list');
                const detialItem = detailList.querySelector(`li[data-id='detail-${id}-${size}']`);
                const detailPrice = detialItem.querySelector('#detailPrice');
                detailPrice.innerHTML = 'Rp' + price * newVal;

                const totalPriceElement = document.getElementById('totalPrice');
                const totalPrice1Element = document.getElementById('totalPrice1');
                const totalPriceinputElement = document.getElementById('totalPriceInput');
                let totalPrice = 0
                carts.forEach(cart => {
                    totalPrice += cart.price * cart.qty
                });
                totalPriceElement.innerHTML = 'Rp' + totalPrice
                totalPrice1Element.innerHTML = 'Rp' + totalPrice
                totalPriceinputElement.value = totalPrice

                addToCart();
            }

            return newVal;
        }

        function addToCart() {
            cookieCart = getCookie("cart");
            cookieCart = JSON.parse(cookieCart);

            if (!cookieCart) {
                cookieCart = []
            }

            cookieCart.forEach(element => {
                addObject(element, carts)
            })

            console.log(cookieCart)

            const cartString = JSON.stringify(cookieCart);
            setCookie("cart", cartString, 7);
        }

        function addObject(obj, carts) {
            let found = false;

            for (let i = 0; i < carts.length; i++) {
                if (carts[i].id === obj.id && carts[i].size === obj.size) {
                    obj.qty = carts[i].qty;
                    if (obj.qty === 0) {
                        found = false;
                        break;
                    }
                    found = true;
                    break;
                }
            }
            if (!found) {
                cookieCart = cookieCart.filter(cart => cart.id !== obj.id || cart.size !== obj.size);
            }
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

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }
    </script>
</x-app-layout>
