<x-layouts.dashboard>
    <x-slot name="header">
        {{ isset($product) ? 'Edit Product' : 'Upload Product' }}
    </x-slot>
    <div class="flex flex-col justify-center items-center w-full">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-500 text-white rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
            action="{{ isset($product) ? route('dashboard.product.put', $product->id) : route('dashboard.product.post') }}"
            class="w-1/2" method="post" enctype="multipart/form-data" x-data="{ imagePreview: '{{ isset($product) ? $product->image_url : '' }}' }">
            @if (isset($product))
                @method('PUT')
            @endif
            @csrf

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="relative flex flex-col items-center justify-center w-full h-40 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300 group">
                        <template x-if="!imagePreview">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg class="w-10 h-10 text-gray-400 group-hover:text-gray-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4a1 1 0 011-1h8a1 1 0 011 1v12M5 12h14M12 12v9"></path>
                                </svg>
                                <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">Select a
                                    photo</p>
                            </div>
                        </template>
                        <template x-if="imagePreview">
                            <img :src="imagePreview" class="absolute inset-0 w-full h-full object-cover">
                        </template>
                        <input type="file" name="image" id="image" class="opacity-0"
                            @change="imagePreview = URL.createObjectURL($event.target.files[0])" {{ isset($product) ? '' : 'required' }}>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                    value="{{ old('name', isset($product) ? $product->title : '') }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" id="description"
                    class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                    required>{{ old('description', isset($product) ? $product->description : '') }} </textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                <input type="number" name="price" id="price"
                    class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded"
                    value="{{ old('price', isset($product) ? $product->price : '') }}" required>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Kategori</label>
                <select name="category_id" id="category_id"
                    class="w-full p-2 border-2 bg-app_cream border-gray-300 focus:ring-0 focus:outline-none focus:border-app_primary rounded" required>
                    <option value="{{ old('category_id', isset($product) ? $product->category->id : '') }}">
                        {{ isset($product) ? $product->category->title : 'Pilih Kategori' }}</option>
                    @foreach ($categories as $category)
                        @if (isset($product) && $category->id != $product->category->id)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-app_primary text-white p-2 rounded">{{ isset($product) ? 'Update' : 'Upload' }}</button>
            </div>
        </form>
        @if (session('success'))
            <div class="mt-6 p-4 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-layouts.dashboard>
