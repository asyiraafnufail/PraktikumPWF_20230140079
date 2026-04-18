<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-4 border-b pb-2">Biodata Diri</h3>
                    <ul class="space-y-2">
                        <li><strong>Nama:</strong> Asyiraaf Nufail</li>
                        <li><strong>NIM:</strong> 20230140079</li>
                        <li><strong>Program Studi:</strong> Teknologi Informasi</li>
                        <li><strong>Hobi:</strong> DJ / Bermain Game Mobile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>