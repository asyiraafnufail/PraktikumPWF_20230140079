<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Kuantitas (Qty)</label>
                        <input type="number" name="qty" value="{{ old('qty', $product->qty) }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                        @error('qty') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Harga (Price)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                        @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Update</button>
                    <a href="{{ route('product.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>