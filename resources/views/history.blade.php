<x-app-layout>
    <div class="w-full">
        @if ($orders->isEmpty())
            <div class="h-screen flex p-0 flex-col justify-center items-center gap-5">
                <img class="h-72" object-contain" src="{{ asset('images/empty-history.png') }}" alt="background">
                <a href="{{ route('menu') }}"
                    class="flex items-center w-64 h-10 justify-center rounded-md border border-transparent bg-app_primary text-base font-semibold text-white">Start
                    Shopping</a>
            </div>
        @else
            <div class="p-2 md:p-16 py-16 md:ppy-0">
                <div class="flex justify-between mb-4">
                    <h2 class="font-medium text-2xl text-app_primary">Recent Orders</h2>
                </div>
                @if (session('success'))
                    <div class="mt-6 mb-4 p-4 bg-green-500 text-white rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
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
                            @php
                                $i = count($orders);
                            @endphp
                            @foreach ($orders as $order)
                                <tr class="text-center border-b-2 border-app_primary">
                                    <td class="border-2 border-app_primary">{{ $i }}</td>
                                    @php
                                        $i--;
                                    @endphp
                                    <td class="border-2 border-app_primary">
                                        <div class="flex flex-col items-start" x-data="{ showAll: false }">
                                            <ul>
                                                @foreach ($order->products as $index => $product)
                                                    <li x-cloak x-show="showAll || {{ $index }} === 0"
                                                        class="flex items-center gap-3 p-2">
                                                        <div class="h-16 w-16">
                                                            <img src="{{ $product->image_url }}"
                                                                class="object-cover h-16 w-16 rounded-xl"
                                                                alt="">
                                                        </div>
                                                        <div>
                                                            {{ $product->title }} x {{ $product->pivot->quantity }}
                                                            ({{ $product->pivot->size == 1 ? 'Small' : ($product->pivot->size == 2 ? 'Medium' : ($product->pivot->size == 3 ? 'Large' : 'Invalid size')) }})
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
                                        {{ \Carbon\Carbon::parse($order->created_at)->isoFormat('DD MMMM YYYY, hh:mm A') }}
                                    </td>
                                    <td class="border-2 border-app_primary">
                                        Rp{{ number_format($order->total_price, 2, ',', '.') }}</td>
                                    <td class="border-2 border-app_primary">In-App Payment</td>
                                    <td class="border-2 border-app_primary">{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links('vendor.pagination.custom') }}
        @endif
    </div>
    </div>

    @include('home.footer')
</x-app-layout>
