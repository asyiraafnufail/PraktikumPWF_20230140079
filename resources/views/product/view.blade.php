<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-700">Nama Produk</h3>
                    <p class="mt-1 text-gray-600">{{ $product->name }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-700">Kuantitas</h3>
                    <p class="mt-1 text-gray-600">{{ $product->qty }} unit</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-700">Harga</h3>
                    <p class="mt-1 text-gray-600">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('product.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>