<x-layouts.dashboard>
    <x-slot name="header">
        All Products
    </x-slot>
    <div x-data="{ showConfirmation: false }">
        <div class="rounded-xl p-6">
            @if (session('success'))
                <div class="mt-6 p-4 bg-green-500 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex justify-between mb-4">
                <h2 class="font-medium text-2xl text-app_primary">All Products</h2>
            </div>
            <a href="{{ route('dashboard.product.add') }}"
                class="flex justify-center gap-2 items-center border-2 w-36 h-10 bg-app_primary border-app_primary mb-6">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="Edit / Add_Plus">
                            <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#ffffff"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </g>
                </svg>
                <p class="text-white">
                    Add Items
                </p>
            </a>
            <table class="w-full table">
                <thead class="bproduct-b-2 border-2 bg-app_grey_high border-app_primary text-app_primary">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-start bproduct-b-2 bproduct-app_primary border-2 border-app_primary">
                            <td class="w-10 p-2 border-2 border-app_primary">#{{ $product->id }}</td>
                            <td class="p-2 h-40 w-44 border-2 border-app_primary text-center align-middle">
                                <img src="{{ $product->image_url }}" class="rounded-xl h-40 w-40 object-cover"
                                    alt="">
                            </td>
                            <td class="w-2/12 p-2 border-2 border-app_primary">{{ $product->title }}</td>
                            <td class="w-24 p-2 text-justify border-2 border-app_primary">{{ $product->category->title }}
                            <td class="w-4/12 p-2 text-justify border-2 border-app_primary">{{ $product->description }}
                            </td>
                            <td class="w-1/12 border-2 p-2 border-app_primary">
                                Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="flex flex-col h-40 justify-center items-center gap-4">
                                <a href="{{ route('dashboard.product.update', $product->id) }}"
                                    class="flex justify-center gap-2 items-center border-2 w-24 h-10 rounded-xl bg-yellow-500 border-yellow-500">
                                    <p class="font-semibold text-white">
                                        Edit
                                    </p>
                                </a>
                                <form method="POST" action="{{ route('dashboard.product.delete', $product->id) }}"
                                    x-data="{ open: false }">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="open = true"
                                        class="flex justify-center gap-2 items-center border-2 w-24 h-10 rounded-xl bg-red-500 border-red-500">
                                        <p class="font-semibold text-white">
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
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links('vendor.pagination.custom') }}
        </div>
    </div>
</x-layouts.dashboard>
