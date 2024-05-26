<x-app-layout>
    <div class="flex flex-col">
        <div class="bg-white">
            <div class="grid grid-cols-8 gap-8 mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div class="col-span-5">
                    <div class="mt-8">
                        <div class="flow-root">
                            <ul id="cart-list" role="list" class="-my-6 divide-y divide-gray-200">
                                @foreach ($carts as $cart)
                                    <li data-id="{{ $cart->id }}-{{ $cart->size }}" class="flex py-6">
                                        <div
                                            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                            <img src="{{ $cart->image_url }}"
                                                alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">{{ $cart->title }}</a>
                                                    </h3>
                                                    <p id="price" class="ml-4">Rp{{ $cart->price * $cart->qty }}
                                                    </p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $cart->size == 1 ? 'Small' : ($cart->size == 2 ? 'Medium' : ($cart->size == 3 ? 'Large' : 'Invalid size')) }}
                                                </p>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                <p class="text-gray-500">Qty {{ $cart->qty }}</p>
                                                <div x-data="{ currentVal: {{ $cart->qty }}, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
                                                    <label for="counterInput"
                                                        class="pl-1 text-sm text-slate-700 dark:text-slate-300">Items(s)</label>
                                                    <div @dblclick.prevent class="flex items-center">
                                                        <button
                                                            @click="currentVal = updatePrice({{ $cart->id }}, {{ $cart->size }}, currentVal, Math.max(minVal, currentVal - incrementAmount), 'substract')"
                                                            class="flex h-10 items-center justify-center rounded-l-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-blue-600"
                                                            aria-label="subtract">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                aria-hidden="true" stroke="currentColor" fill="none"
                                                                stroke-width="2" class="size-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 12h-15" />
                                                            </svg>
                                                        </button>
                                                        <input x-model="currentVal.toFixed(decimalPoints)"
                                                            id="counterInput" type="text"
                                                            class="border-x-none h-10 w-20 rounded-none border-y border-slate-300 bg-slate-100/50 text-center text-black focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-blue-700 dark:border-slate-700 dark:bg-slate-800/50 dark:text-white dark:focus-visible:outline-blue-600"
                                                            readonly />
                                                        <button
                                                            @click="currentVal = updatePrice({{ $cart->id }}, {{ $cart->size }}, currentVal, Math.min(maxVal, currentVal + incrementAmount), 'add')"
                                                            class="flex h-10 items-center justify-center rounded-r-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-blue-600"
                                                            aria-label="add">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                aria-hidden="true" stroke="currentColor" fill="none"
                                                                stroke-width="2" class="size-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex">
                                                    <button type="button"
                                                        onclick="deleteCart({{ $cart->id }}, {{ $cart->size }})"
                                                        class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 bg-gray-100 rounded-xl">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p id="totalPrice">Rp{{ $totalPrice }}</p>
                                <input id="totalPriceInput" type="hidden" name="total_price" value="{{ $totalPrice }}">
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <button type="submit"
                                class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    or
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Continue Shopping
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Balance</p>
                                <p id="totalPrice">Rp{{ $balance }}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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

                const cartList = document.getElementById('cart-list');
                const cartItem = cartList.querySelector(`li[data-id='${id}-${size}']`);
                const priceParagraph = cartItem.querySelector('#price');
                priceParagraph.innerHTML = 'Rp' + price * newVal;

                const totalPriceElement = document.getElementById('totalPrice');
                const totalPriceinputElement = document.getElementById('totalPriceInput');
                let totalPrice = 0
                carts.forEach(cart => {
                    totalPrice += cart.price * cart.qty
                });
                totalPriceElement.innerHTML = 'Rp' + totalPrice
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
                    if(obj.qty === 0) {
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
