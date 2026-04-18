<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('product.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tambah Produk</a>

                <table class="w-full mt-6 text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2 px-4">No</th>
                            <th class="border-b py-2 px-4">Nama Produk</th>
                            <th class="border-b py-2 px-4">Kuantitas</th>
                            <th class="border-b py-2 px-4">Harga</th>
                            <th class="border-b py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                        <tr>
                            <td class="border-b py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="border-b py-2 px-4">{{ $item->name }}</td>
                            <td class="border-b py-2 px-4">{{ $item->qty }}</td>
                            <td class="border-b py-2 px-4">Rp {{ number_format($item->price, 2, ',', '.') }}</td>
                            <td class="border-b py-2 px-4">
                                <a href="{{ route('product.show', $item->id) }}" class="text-blue-500 hover:underline">View</a> | 
                                <a href="{{ route('product.edit', $item->id) }}" class="text-yellow-500 hover:underline">Edit</a> | 
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data produk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>