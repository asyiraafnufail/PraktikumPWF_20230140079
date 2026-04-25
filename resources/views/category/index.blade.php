<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category List') }}
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

                <div class="flex justify-end mb-4">
                    <a href="{{ route('category.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">+ Add Category</a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border-b py-3 px-4 text-sm font-semibold text-gray-600 uppercase">No</th>
                            <th class="border-b py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Name</th>
                            <th class="border-b py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Total Product</th>
                            <th class="border-b py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border-b py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="border-b py-3 px-4">{{ $item->name }}</td>
                            <td class="border-b py-3 px-4">{{ $item->products_count }}</td>
                            <td class="border-b py-3 px-4 flex items-center space-x-2">
                                <x-edit-button :url="route('category.edit', $item->id)" />
                                <x-delete-button :url="route('category.destroy', $item->id)" />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data kategori.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
