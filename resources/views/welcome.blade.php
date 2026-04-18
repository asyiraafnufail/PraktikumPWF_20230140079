<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pertemuan 1 - Laravel 12</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex items-center justify-center p-6">

    @if (Route::has('login'))
        <div class="absolute top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="bg-white border border-gray-200 p-10 rounded-xl shadow-sm max-w-lg w-full mt-10 sm:mt-0">
        
        <div class="border-b border-gray-200 pb-6 mb-6">
            <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">Tugas Framework Laravel</h1>
            <p class="text-sm text-gray-500 mt-1">Modul Pertemuan 1: Pengenalan dan Instalasi</p>
        </div>
        
        <div class="space-y-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</p>
                <p class="text-lg font-medium text-gray-900 mt-1">Asyiraaf Nufail Dhiaurrahman Arrayyan</p>
            </div>
            
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Induk Mahasiswa</p>
                <p class="text-lg font-mono text-gray-900 mt-1">20230140079</p>
            </div>
        </div>
    </div>

</body>
</html>