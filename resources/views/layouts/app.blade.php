<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') - CMS Panti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">CMS Panti</a>
                <div class="flex gap-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600">Tentang Kami</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-blue-600">Galeri</a>
                    <a href="/admin" class="text-gray-700 hover:text-blue-600">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-6 py-8">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} CMS Panti. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
