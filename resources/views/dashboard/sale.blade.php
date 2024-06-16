<x-layouts.dashboard>
    <x-slot name="header">
        Sale
    </x-slot>
    <div class="container mx-auto p-4">
        <div>
            <form method="GET" action="{{ route('dashboard.sale') }}" class="mb-4">
                <div class="flex justify-between">
                    <div class="flex space-y-4 md:space-y-0 md:space-x-4 gap-2">
                        <div>
                            <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ $startDate->format('Y-m-d') }}"
                                class="mt-1 block w-full p-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded">
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $endDate->format('Y-m-d') }}"
                                class="mt-1 block w-full p-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded">
                        </div>
                        <div>
                            <label for="sort_by" class="block text-gray-700 font-bold mb-2">Sort By</label>
                            <select name="sort_by" id="sort_by"
                                class="bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded">
                                <option value="total_quantity" {{ $sortBy == 'total_quantity' ? 'selected' : '' }}>Total
                                    Quantity</option>
                                <option value="total_revenue" {{ $sortBy == 'total_revenue' ? 'selected' : '' }}>Total
                                    Revenue</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort_order" class="block text-gray-700 font-bold mb-2">Sort Order</label>
                            <select name="sort_order" id="sort_order"
                                class="bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded">
                                <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Descending</option>
                                <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Ascending</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex items-end">
                            <button type="submit"
                                class="border-2 w-24 rounded-xl p-2 font-semibold bg-app_primary border-app_primary text-white">Filter</button>
                        </div>
                        <div class="ml-4 flex items-end">
                            <a href="{{ route('products.export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'sort_by' => request('sort_by'), 'sort_order' => request('sort_order'), 'search' => request('search')]) }}"
                                class="border-2 w-32 rounded-xl p-2 font-semibold bg-app_primary border-app_primary text-white">Export
                                to PDF</a>
                        </div>
                    </div>
                </div>
                <div class="my-4 w-1/4">
                    <label for="search" class="block text-gray-700 font-bold mb-2">Search</label>
                    <input type="text" name="search" id="search" value="{{ $search }}"
                        class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                        placeholder="Search products...">
                </div>
            </form>
            <!-- Products List -->
            <div class="">
                <table class="w-full table">
                    <thead class="bproduct-b-2 border-2 bg-app_grey_high border-app_primary text-app_primary">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Total Quantity</th>
                            <th>Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="text-center bproduct-b-2 bproduct-app_primary border-2 border-app_primary">
                                <td class="w-4 p-2 border-2 border-app_primary">#{{ $product->id }}</td>
                                <td class="w-24 p-2 border-2 border-app_primary">{{ $product->title }}</td>
                                <td class="w-24 p-2 border-2 border-app_primary">
                                    {{ $product->category->title }}
                                <td class="w-24 border-2 p-2 border-app_primary">
                                    Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                                <td class="w-6 border-2 p-2 border-app_primary">
                                    {{ $product->total_quantity ? $product->total_quantity : '0' }}</td>
                                <td class="w-24 border-2 p-2 border-app_primary">
                                    Rp{{ number_format($product->total_revenue, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</x-layouts.dashboard>
