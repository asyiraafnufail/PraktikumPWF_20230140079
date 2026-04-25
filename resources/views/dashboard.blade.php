<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col space-y-4">
                    <p class="text-lg">{{ __("You're logged in!") }} Selamat Datang, <strong>{{ Auth::user()->name }}</strong>!</p>
                    
                    <div class="p-4 border rounded-md {{ Auth::user()->role === 'admin' ? 'bg-blue-50 border-blue-200 text-blue-900' : 'bg-gray-50 border-gray-200 text-gray-900' }}">
                        <h3 class="font-bold mb-2">Informasi Sesi Login Saat Ini:</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li><strong>Alamat Email:</strong> {{ Auth::user()->email }}</li>
                            <li><strong>Tingkat Hak Akses (Role):</strong> 
                                @if(Auth::user()->role === 'admin')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ml-1 border border-blue-200">
                                        Administrator
                                    </span>
                                    <p class="text-sm mt-2 ml-5 text-blue-700">✓ Anda memiliki akses khusus untuk melihat dan mengelola menu <b>Category</b>.</p>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-1 border border-gray-200">
                                        User Biasa
                                    </span>
                                    <p class="text-sm mt-2 ml-5 text-gray-600">⚠ Anda adalah user reguler. Anda tidak dapat melihat atau mengakses menu <b>Category</b>.</p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
