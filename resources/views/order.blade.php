<x-app-layout>
    <div class="flex flex-col">
        <div class="bg-white">
            <div class="grid grid-cols-8 gap-8 mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div class="col-span-5">
                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                <li class="flex py-6">
                                    <div
                                        class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                        <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                            alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                            class="h-full w-full object-cover object-center">
                                    </div>

                                    <div class="ml-4 flex flex-1 flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3>
                                                    <a href="#">Throwback Hip Bag</a>
                                                </h3>
                                                <p class="ml-4">$90.00</p>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Salmon</p>
                                        </div>
                                        <div class="flex flex-1 items-end justify-between text-sm">
                                            <p class="text-gray-500">Qty 1</p>

                                            <div class="flex">
                                                <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="flex py-6">
                                    <div
                                        class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                        <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                            alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                            class="h-full w-full object-cover object-center">
                                    </div>

                                    <div class="ml-4 flex flex-1 flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3>
                                                    <a href="#">Medium Stuff Satchel</a>
                                                </h3>
                                                <p class="ml-4">$32.00</p>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Blue</p>
                                        </div>
                                        <div class="flex flex-1 items-end justify-between text-sm">
                                            <p class="text-gray-500">Qty 1</p>

                                            <div class="flex">
                                                <button type="button"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- More products... -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 bg-gray-100 rounded-xl">
                    <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Subtotal</p>
                            <p>$262.00</p>
                        </div>
                        <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                        <div class="mt-6">
                            <a href="#"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
