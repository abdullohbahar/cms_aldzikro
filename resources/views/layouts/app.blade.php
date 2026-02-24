<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home') - CMS Panti</title>

    {{-- Box Icon --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #hero-section {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: linear-gradient(110deg,
                    rgba(37, 60, 86, .63),
                    rgba(75, 107, 144, 100)),
                url("{{ asset('/assets/hero-bg.webp') }}");
        }

        .page-header {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: linear-gradient(110deg,
                    rgba(37, 60, 86, .8),
                    rgba(37, 60, 86, .8)),
                url("{{ asset('/assets/page-header-bg.jpeg') }}");
        }
    </style>

</head>

<body class="bg-gray-50">

    <header class="absolute inset-x-0 top-0 z-50">
        <div class="container">
            <nav aria-label="Global" class="flex items-center justify-between py-3">
                <div class="flex lg:flex-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo Al Dzikro" class="h-12 md:h-17 w-auto">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" command="show-modal" commandfor="mobile-menu"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <ul class="hidden lg:flex lg:gap-x-3">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">
                            <span>Tentang Kami</span>
                        </a>
                    </li>
                    <li class="nav-item relative group">
                        <a href="#" class="nav-link">
                            <span>Media</span>
                            <i class='bx bx-chevron-down'></i>
                        </a>
                        <div
                            class="dropdown-menu hidden opacity-0 group-hover:flex group-hover:flex-col group-hover:opacity-100 absolute top-9 left-0 min-w-30 max-w-50">
                            {{-- <a class="dropdown-item" href="{{ route('social-media') }}">Media Sosial</a> --}}
                            <a class="dropdown-item" href="{{ route('gallery') }}">Galeri</a>
                            <a class="dropdown-item" href="{{ route('articles') }}">Artikel</a>
                        </div>
                    </li>
                    <li class="nav-item relative group">
                        <a href="#" class="nav-link">
                            <span>Program</span>
                            <i class='bx bx-chevron-down'></i>
                        </a>
                        <div
                            class="dropdown-menu hidden opacity-0 group-hover:flex group-hover:flex-col group-hover:opacity-100 absolute top-9 left-0 w-50">
                            <a class="dropdown-item" href="{{ route('schedule') }}">Jadwal Harian Santri</a>
                            <a class="dropdown-item" href="{{ route('programs') }}">Program Unggulan</a>
                        </div>
                    </li>
                    <li class="nav-item relative group">
                        <a href="#" class="nav-link">
                            <span>Donasi</span>
                            <i class='bx bx-chevron-down'></i>
                        </a>
                        <div
                            class="dropdown-menu hidden opacity-0 group-hover:flex group-hover:flex-col group-hover:opacity-100 absolute top-9 left-0 w-40">
                            <a class="dropdown-item" href="{{ route('donasi.panduan') }}">Panduan Donasi</a>
                            <a class="dropdown-item" href="{{ route('donasi.index') }}">Donasi</a>
                        </div>
                    </li>
                    <li class="nav-item relative group">
                        <a href="#" class="nav-link">
                            <span>Lainnya</span>
                            <i class='bx bx-chevron-down'></i>
                        </a>
                        <div
                            class="dropdown-menu hidden opacity-0 group-hover:flex group-hover:flex-col group-hover:opacity-100 absolute top-9 left-0 w-45">
                            <a class="dropdown-item" href="{{ route('registration') }}">Pendaftaran Santri</a>
                            <a class="dropdown-item" href="{{ route('beneficiaries') }}">Penerima Santunan</a>
                            <a class="dropdown-item" href="{{ route('contact') }}">Kritik dan Saran</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            <span>Kontak</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <el-dialog>
                <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                    <div tabindex="0" class="fixed inset-0 focus:outline-none">
                        <el-dialog-panel
                            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/logo.png') }}" alt="Logo Al Dzikro" class="h-12 w-auto">
                                </a>
                                <button type="button" command="close" commandfor="mobile-menu"
                                    class="-m-2.5 rounded-md p-2.5 text-gray-200">
                                    <span class="sr-only">Close menu</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        data-slot="icon" aria-hidden="true" class="size-6">
                                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-6 flow-root">
                                <div class="-my-6 divide-y divide-white/10">
                                    <ul id="mobile-menu" class="space-y-1 py-6 font-primary text-sm uppercase">
                                        <li class="mobile-menu-item">
                                            <a href="{{ route('home') }}"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Beranda</a>
                                        </li>
                                        <li class="mobile-menu-item">
                                            <a href="{{ route('about') }}"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Tentang
                                                Kami</a>
                                        </li>
                                        <li class="mobile-menu-item dropdown ">
                                            <a href="#"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Media
                                                <i class='bx bx-chevron-down'></i></a>
                                            <div class="mobile-dropdown-menu">
                                                <a class="menu-mobile-link" href="#">Media Sosial</a>
                                                <a class="menu-mobile-link" href="{{ route('gallery') }}">Galeri</a>
                                                <a class="menu-mobile-link"
                                                    href="{{ route('articles') }}">Artikel</a>
                                            </div>
                                        </li>
                                        <li class="mobile-menu-item dropdown">
                                            <a href="#"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Program
                                                <i class='bx bx-chevron-down'></i></a>
                                            <div class="mobile-dropdown-menu">
                                                <a class="menu-mobile-link" href="{{ route('schedule') }}">Jadwal
                                                    Harian Santri</a>
                                                <a class="menu-mobile-link" href="{{ route('programs') }}">Program
                                                    Unggulan</a>
                                            </div>
                                        </li>
                                        <li class="mobile-menu-item dropdown">
                                            <a href="#"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Donasi
                                                <i class='bx bx-chevron-down'></i></a>
                                            <div class="mobile-dropdown-menu">
                                                <a class="menu-mobile-link"
                                                    href="{{ route('donasi.panduan') }}">Panduan Donasi</a>
                                                <a class="menu-mobile-link"
                                                    href="{{ route('donasi.index') }}">Donasi</a>
                                            </div>
                                        </li>
                                        <li class="mobile-menu-item dropdown">
                                            <a href="#"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Lainnya
                                                <i class='bx bx-chevron-down'></i></a>
                                            <div class="mobile-dropdown-menu">
                                                <a class="menu-mobile-link" href="#">Pendaftaran Santri</a>
                                                <a class="menu-mobile-link" href="#">Penerima Santunan</a>
                                                <a class="menu-mobile-link" href="#">Kritik dan Saran</a>
                                            </div>
                                        </li>
                                        <li class="mobile-menu-item">
                                            <a href="{{ route('contact') }}"
                                                class="-mx-3 block rounded-lg px-3 py-2 font-semibold text-white hover:bg-white/5">Kontak</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </el-dialog-panel>
                    </div>
                </dialog>
            </el-dialog>
        </div>
    </header>


    <!-- Content -->
    <main>
        <div class="container mx-auto px-4">
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mt-25" role="alert">
                    <p class="font-bold">Perhatian!</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white mt-12">
        <div class="container py-18">
            <div class="grid grid-cols-12 gap-3 md:gap-8">

                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <img src="https://aldzikro.org/wp-content/uploads/2025/06/logo-al-dzikro-1.png" alt=""
                        class="w-1/2 h-auto object-contain mb-3">
                    <p class="leading-loose">Yayasan Al-Dzikro berdiri atas kepedulian terhadap anak yatim, piatu, kaum
                        dhuafa, dan orang jompo yang kurang beruntung.</p>
                </div>

                <div class="col-span-12 md:col-span-3 lg:col-span-2">
                    <h5 class="font-medium text-lg mb-5">Informasi</h5>
                    <ul class="flex flex-col gap-3">
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="{{ route('programs') }}">Program Unggulan</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="{{ route('schedule') }}">Jadwal Harian</a>
                        </li>
                        <li class="hover:text-accent transition-all duration-300">
                            <a href="{{ route('contact') }}">Kontak Kami</a>
                        </li>
                    </ul>
                </div>

                <div class="col-span-12 md:col-span-3 lg:col-span-2 ">
                    <h5 class="font-medium text-lg mb-5">Alamat</h5>
                    <p class="mb-2">Wukirsari, Imogiri, Bantul</p>
                    <p class="mb-2">082987729223</p>
                </div>

                <div class="col-span-6 md:col-span-3 lg:col-span-2">
                    <img src="https://aldzikro.org/wp-content/uploads/2025/06/qr-code-aldzikro.png" alt=""
                        class="aspect-square">
                </div>

                <div class="col-span-6 md:col-span-4 lg:col-span-2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d87682.14192642561!2d110.391643!3d-7.908523000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a547000000001%3A0xba21a4fb2bd5da11!2sAl%20Dzikro%20Yogyakarta!5e1!3m2!1sen!2sus!4v1766325336538!5m2!1sen!2sus"
                        class="w-full h-55" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#253C56',
                });
            });
        </script>
    @endif

    @yield('script')
</body>

</html>
