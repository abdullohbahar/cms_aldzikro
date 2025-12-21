<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') - CMS Panti</title>
    @yield('style')
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
    <footer class="bg-primary text-white mt-12">
        <div class="container py-18">
            <div class="grid grid-cols-12 gap-3 md:gap-8">

                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <img src="https://aldzikro.org/wp-content/uploads/2025/06/logo-al-dzikro-1.png" alt="" class="w-1/2 h-auto object-contain mb-3">
                    <p class="leading-loose">Yayasan Al-Dzikro berdiri atas kepedulian terhadap anak yatim, piatu, kaum dhuafa, dan orang jompo yang kurang beruntung.</p>
                </div>
                
                <div class="col-span-12 md:col-span-3 lg:col-span-2">
                    <h5 class="font-medium text-lg mb-5">Informasi</h5>
                    <ul class="flex flex-col gap-3">
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="#">Tentang Kami</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="#">Media Sosial</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="#">Donasi</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="#">Kontak Kami</a>
                        </li>
                    </ul>
                </div>

                <div class="col-span-12 md:col-span-3 lg:col-span-2 ">
                    <h5 class="font-medium text-lg mb-5">Alamat</h5>
                    <p class="mb-2">Wukirsari, Imogiri, Bantul</p>
                    <p class="mb-2">082987729223</p>
                </div>

                <div class="col-span-6 md:col-span-3 lg:col-span-2">
                    <img src="https://aldzikro.org/wp-content/uploads/2025/06/qr-code-aldzikro.png" alt="" class="aspect-square">
                </div>

                <div class="col-span-6 md:col-span-4 lg:col-span-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d87682.14192642561!2d110.391643!3d-7.908523000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a547000000001%3A0xba21a4fb2bd5da11!2sAl%20Dzikro%20Yogyakarta!5e1!3m2!1sen!2sus!4v1766325336538!5m2!1sen!2sus" class="w-full h-55" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>

     @yield('script')
</body>
</html>
