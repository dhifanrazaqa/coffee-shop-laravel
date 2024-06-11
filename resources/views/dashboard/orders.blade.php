<x-layouts.dashboard>
    <x-slot name="header">
        All Orders
    </x-slot>
    <div>
        <div class="rounded-xl p-6 border-app_primary">
            @if (session('success'))
                <div class="mt-6 p-4 bg-green-500 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-between mb-4">
                <h2 class="font-medium text-2xl text-app_primary">Recent Orders</h2>
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
                        <th>Action</th>
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
                                            <li x-show="showAll || {{ $index }} === 0"
                                                class="flex items-center gap-3 p-2">
                                                <div>
                                                    <img src="{{ $product->image_url }}"
                                                        class="object-cover h-16 w-16 rounded-xl" alt="">
                                                </div>
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
                            <td class="border-2 border-app_primary">
                                {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY, hh:mm A') }}</td>
                            <td class="border-2 border-app_primary">
                                Rp{{ number_format($order->total_price, 2, ',', '.') }}</td>
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
                                                action="{{ route('update.order.status', $order->id) }}" role="none">
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
                            <td class="border-2 border-app_primary">
                                <div class="inline-flex relative">
                                    <form method="POST" action="{{ route('dashboard.order.delete', $order->id) }}"
                                        x-data="{ open: false }">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" @click="open = true"
                                            class="flex justify-center gap-2 items-center border-2 w-24 h-10 bg-red-500 border-red-500">
                                            <svg class="h-6 w-6" viewBox="0 0 1024 1024"
                                                xmlns="http://www.w3.org/2000/svg" fill="#4A2E2C">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill="#4A2E2C"
                                                        d="M352 192V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64H96a32 32 0 0 1 0-64h256zm64 0h192v-64H416v64zM192 960a32 32 0 0 1-32-32V256h704v672a32 32 0 0 1-32 32H192zm224-192a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32zm192 0a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <p>
                                                Delete
                                            </p>
                                        </button>

                                        <div x-show="open" x-cloak
                                            class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
                                            <div class="bg-white p-8 rounded shadow-lg">
                                                <p class="mb-4">Apakah Anda yakin ingin menghapus produk ini?</p>
                                                <div class="flex items-center justify-end">
                                                    <button type="button" @click="open = false"
                                                        class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                                                        Batal
                                                    </button>
                                                    <button type="submit"
                                                        class="bg-red-500 text-white px-4 py-2 rounded">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links('vendor.pagination.custom') }}
        </div>
    </div>
</x-layouts.dashboard>
