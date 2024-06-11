<x-layouts.dashboard>
    <x-slot name="header">
        Home
    </x-slot>

    <div class="flex flex-col gap-10 ">
        <div class="grid grid-cols-12 justify-start gap-10">
            <div class="col-span-4 flex justify-between rounded-xl border-2 p-6 border-app_primary">
                <div class="flex gap-3">
                    <div class="border-2 border-app_primary rounded-2xl bg-app_grey_low p-2 w-14">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#4A2E2C">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M2.16208 8.49969C2 9.60346 2 11.0495 2 13C2 16.7712 2 18.6569 3.17157 19.8284C4.34315 21 6.22876 21 10 21H14C17.7712 21 19.6569 21 20.8284 19.8284C22 18.6569 22 16.7712 22 13C22 11.0497 22 9.60364 21.8379 8.49989C19.5613 9.97971 18.1021 10.9235 16.7501 11.5047V12.0001C16.7501 12.4143 16.4143 12.7501 16.0001 12.7501C15.5914 12.7501 15.259 12.4231 15.2503 12.0165C13.12 12.5781 10.8802 12.5781 8.74991 12.0165C8.74121 12.4231 8.40883 12.7501 8.00009 12.7501C7.58587 12.7501 7.25009 12.4143 7.25009 12.0001V11.5046C5.89804 10.9234 4.43881 9.97957 2.16208 8.49969Z"
                                    fill="#4A2E2C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.5814 2.25L10.561 2.25C10.4474 2.24998 10.3591 2.24997 10.2755 2.25503C9.21507 2.31926 8.28647 2.98855 7.89021 3.97426C7.8588 4.05239 7.80711 4.20756 7.77024 4.31825L7.76636 4.32989C7.66326 4.60981 7.47709 4.85224 7.26157 5.02534C7.03409 5.0327 6.81683 5.0422 6.60915 5.05445C4.96519 5.15144 3.92193 5.42122 3.17157 6.17158C2.92691 6.41624 2.73334 6.69204 2.5802 7.00965C2.63777 7.0293 2.69387 7.05632 2.74721 7.09099C4.8475 8.45617 6.16709 9.31008 7.26356 9.85786C7.33001 9.51166 7.6345 9.25009 8.00009 9.25009C8.4143 9.25009 8.75009 9.58588 8.75009 10.0001V10.458C10.8695 11.0976 13.1306 11.0976 15.2501 10.458V10.0001C15.2501 9.58588 15.5859 9.25009 16.0001 9.25009C16.3657 9.25009 16.6702 9.5117 16.7366 9.85794C17.8331 9.31015 19.1527 8.45623 21.2531 7.09099C21.3064 7.05638 21.3624 7.02939 21.4199 7.00975C21.2667 6.6921 21.0731 6.41626 20.8284 6.17158C20.0781 5.42122 19.0348 5.15144 17.3909 5.05445C17.1937 5.04282 16.9879 5.03367 16.773 5.02648C16.7594 5.01545 16.7458 5.00406 16.7322 4.99231C16.4915 4.78435 16.3033 4.51011 16.2084 4.25288L16.2053 4.24344C16.1694 4.13576 16.1415 4.05195 16.1102 3.97426C15.714 2.98855 14.7854 2.31926 13.725 2.25503C13.6414 2.24997 13.553 2.24998 13.4395 2.25L10.5814 2.25ZM14.8176 4.81569L14.8131 4.80495L14.8082 4.79286L14.8037 4.78091L14.8 4.77097L14.7982 4.76596L14.794 4.75373L14.7902 4.74244L14.7881 4.73617L14.7853 4.72783L14.7831 4.72079L14.7813 4.7151C14.742 4.59708 14.7299 4.56204 14.7185 4.53375C14.5384 4.08571 14.1163 3.78148 13.6343 3.75229C13.602 3.75034 13.5625 3.75 13.4191 3.75H10.5814C10.438 3.75 10.3984 3.75034 10.3662 3.75229C9.88424 3.78148 9.46221 4.08561 9.28204 4.53354L9.2794 4.54052L9.27143 4.56245C9.2648 4.58104 9.25672 4.60429 9.2474 4.63156C9.23088 4.67994 9.21232 4.73546 9.19351 4.79186L9.19168 4.79777L9.18945 4.80481L9.18671 4.81314L9.18462 4.81941L9.18079 4.83071L9.17655 4.84295L9.17477 4.84796L9.17113 4.85791L9.16655 4.86987L9.16168 4.88199L9.15751 4.8919L9.15686 4.89336C9.14293 4.92921 9.12818 4.96498 9.11263 5.00064C9.39625 5 9.69183 5 10 5H14C14.3115 5 14.6101 5 14.8965 5.00066C14.868 4.93956 14.8417 4.87784 14.8176 4.81569Z"
                                    fill="#4A2E2C"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="font-semibold">Total Order</h2>
                        <h2 class="font-normal text-green-600">+{{ $newOrderCount }}</h2>
                    </div>
                </div>
                <div>
                    <h2 class="font-normal text-5xl">{{ $allOrderCount }}</h2>
                </div>
            </div>
            <div class="col-span-4 flex justify-between rounded-xl border-2 p-6 border-app_primary">
                <div class="flex gap-3">
                    <div class="border-2 border-app_primary rounded-2xl bg-app_grey_low p-2 w-14">
                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#4A2E2C"
                            class="bi bi-people-fill">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z">
                                </path>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="font-semibold">Total Customer</h2>
                        <h2 class="font-normal text-green-600">+{{ $newUserCount }}</h2>
                    </div>
                </div>
                <div>
                    <h2 class="font-normal text-5xl">{{ $allUserCount }}</h2>
                </div>
            </div>
            <div class="col-span-4 flex justify-between rounded-xl border-2 p-6 border-app_primary">
                <div class="flex gap-3">
                    <div class="border-2 border-app_primary rounded-2xl bg-app_grey_low p-2 w-14">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.61132 13C9.24662 13 8.91085 13.1985 8.7351 13.5181C8.36855 14.1845 8.85071 15 9.61131 15H18.92C19.4723 15 19.92 15.4477 19.92 16C19.92 16.5523 19.4723 17 18.92 17H17.93H7.92999H7.92004C6.40004 17 5.44004 15.37 6.17004 14.03L7.02318 12.488C7.33509 11.9243 7.35632 11.2448 7.08022 10.6627L4.25211 4.70011C4.04931 4.27254 3.6184 4 3.14518 4H2.92004C2.36776 4 1.92004 3.55228 1.92004 3C1.92004 2.44772 2.36776 2 2.92004 2H3.92398C4.69708 2 5.40095 2.44557 5.7317 3.14435L5.90228 3.50471C5.93443 3.5016 5.96703 3.5 6 3.5H21C21.5523 3.5 22 3.94772 22 4.5C22 4.77321 21.8904 5.02082 21.7129 5.20131C21.7448 5.41025 21.7106 5.63097 21.6008 5.83041L18.22 11.97C17.88 12.59 17.22 13 16.47 13H9.61132ZM7.92999 17C9.03456 17 9.92999 17.8954 9.92999 19C9.92999 20.1046 9.03456 21 7.92999 21C6.82542 21 5.92999 20.1046 5.92999 19C5.92999 17.8954 6.82542 17 7.92999 17ZM17.93 17C16.8254 17 15.93 17.8954 15.93 19C15.93 20.1046 16.8254 21 17.93 21C19.0346 21 19.93 20.1046 19.93 19C19.93 17.8954 19.0346 17 17.93 17Z"
                                    fill="#4A2E2C"></path>
                                <path
                                    d="M7.92999 20C8.48228 20 8.92999 19.5523 8.92999 19C8.92999 18.4477 8.48228 18 7.92999 18C7.37771 18 6.92999 18.4477 6.92999 19C6.92999 19.5523 7.37771 20 7.92999 20Z"
                                    fill="#4A2E2C"></path>
                                <path
                                    d="M18.93 19C18.93 19.5523 18.4823 20 17.93 20C17.3777 20 16.93 19.5523 16.93 19C16.93 18.4477 17.3777 18 17.93 18C18.4823 18 18.93 18.4477 18.93 19Z"
                                    fill="#4A2E2C"></path>
                                <path
                                    d="M15.99 6.79166L15.4025 6.2L12.6567 8.94583L11.5817 7.875L10.99 8.4625L12.6567 10.125L15.99 6.79166Z"
                                    fill="white"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="font-semibold">Total Sales</h2>
                        <h2 class="font-normal text-3xl">Rp{{ $allSaleCount }}</h2>
                    </div>
                </div>
                <div>
                    <h2 class="font-normal text-green-600">+Rp{{ $newSaleCount }}</h2>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-8 justify-between rounded-xl border-2 p-6 border-app_primary">
                <div class="flex justify-between mb-4">
                    <h2 class="font-medium text-2xl">Recent Order</h2>
                    <a href="{{ route('dashboard.order') }}" class="hover:underline text-green-600">See all</a>
                </div>
                <table class="w-full table-auto">
                    <thead class="border-2 bg-app_grey_high border-app_primary text-app_primary">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Items</th>
                            <th>Order Date</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="text-center border-b-2 border-app_primary">
                                <td class="border-2 border-app_primary">{{ $order->id }}</td>
                                <td class="border-2 border-app_primary">
                                    <div class="flex flex-col items-start" x-data="{ showAll: false }">
                                        <ul>
                                            @foreach ($order->products as $index => $product)
                                                <li x-cloak x-show="showAll || {{ $index }} === 0"
                                                    class="flex items-center gap-3 px-2">
                                                    <div>
                                                        {{ $product->title }} x {{ $product->pivot->quantity }}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @if ($order->products->count() > 1)
                                            <div class="px-2">
                                                <a href="javascript:void(0);" @click="showAll = !showAll"
                                                    class="text-green-500 hover:underline hover:text-green-700">
                                                    <span x-text="showAll ? 'See Less' : 'See All'"></span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-2 border-app_primary">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                <td class="border-2 border-app_primary">Rp{{ number_format($order->total_price, 2, ',', '.') }}</td>
                                <td class="border-2 border-app_primary">In-App Payment</td>
                                <td class="border-2 border-app_primary">
                                    <div class="p-4 w-full rounded-xl">
                                        <div x-data="{ open: false }" class="inline-flex relative">
                                            <button @click="open = ! open"
                                                class="px-4 pe-10 py-2 border {{ $order->status == 'In Process' ? 'border-yellow-600' : 'border-green-600' }} rounded-lg shadow-sm">
                                                <span
                                                    class="select-none absolute inset-y-0 right-0 flex items-center cursor-pointer pr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </span>
                                                <p
                                                    class="{{ $order->status == 'In Process' ? 'text-yellow-600' : 'text-green-600' }}">
                                                    {{ $order->status }}</p>
                                            </button>
                                            <div x-cloak x-show="open" @click.away="open = false"
                                                class="w-full absolute top-12 left-0 py-2 order-1 hover:border-app_primary border-2 rounded-lg shadow ">
                                                <form method="POST"
                                                    action="{{ route('update.order.status', $order->id) }}"
                                                    role="none">
                                                    @csrf
                                                    @method('PUT')

                                                    @if ($order->status == 'In Process')
                                                        <input type="hidden" name="status" value="Successful">
                                                        <button type="submit"
                                                            class="px-2 py-1 cursor-pointer hover:border-app_primary rounded-lg text-green-600">
                                                            Successful
                                                        </button>
                                                    @else
                                                        <input type="hidden" name="status" value="In Process">
                                                        <button type="submit"
                                                            class="px-2 py-1 cursor-pointer hover:border-app_primary rounded-lg text-yellow-600">
                                                            In Process
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-span-4 flex flex-col justify-between rounded-xl border-2 p-6 border-app_primary">
                <div class="flex justify-between mb-4">
                    <h2 class="font-medium text-2xl">Newest Items</h2>
                    <a href="{{ route('dashboard.product') }}" class="hover:underline text-green-600">See all</a>
                </div>
                @foreach ($products as $product)
                    <div class="flex justify-between w-full">
                        <div class="flex gap-4">
                            <div class="">
                                <img src="{{ $product->image_url }}" class="w-12 h-12 rounded-xl object-cover" alt="">
                            </div>
                            <div>
                                <h2 class="text-xl">{{ $product->title }}</h2>
                                <p class="font-light text-green-600">Rp{{ $product->price }}</p>
                            </div>
                        </div>
                        <div>
                            <p>{{ $product->category->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.dashboard>
