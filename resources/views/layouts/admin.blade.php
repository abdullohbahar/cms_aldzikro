<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - CMS Panti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Sidebar transition */
        .sidebar {
            transition: transform 0.3s ease-in-out;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .sidebar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari and Opera */
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                z-index: 50;
                display: block !important;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .sidebar-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Mobile Header -->
        <div class="md:hidden bg-gray-900 text-white p-4 flex justify-between items-center">
            <span class="font-bold text-xl">CMS Panti</span>
            <button id="mobile-menu-btn" class="text-white hover:text-gray-300">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="sidebar bg-gray-900 text-white w-64 flex-shrink-0 h-screen sticky top-0 overflow-y-auto md:block transition-all duration-300">
            <div class="p-6 border-b border-gray-800">
                <h1 class="text-2xl font-bold"><i class="fas fa-cube mr-2"></i>CMS Panti</h1>
                <p class="text-xs text-gray-500 mt-1 uppercase tracking-wider">Admin Panel</p>
            </div>
            <nav class="mt-6 px-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                    <i class="fas fa-chart-line w-6 text-center mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- MANAJEMEN KONTEN -->
                <div class="mt-6 mb-2 px-4">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Manajemen Konten</p>
                </div>

                @can('manage-categories')
                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-folder w-6 text-center mr-2"></i>
                        <span class="font-medium">Kategori</span>
                    </a>
                @endcan

                @can('manage-articles')
                    <a href="{{ route('admin.articles.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.articles.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-newspaper w-6 text-center mr-2"></i>
                        <span class="font-medium">Artikel</span>
                    </a>
                @endcan

                @can('manage-galleries')
                    <a href="{{ route('admin.galleries.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.galleries.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-images w-6 text-center mr-2"></i>
                        <span class="font-medium">Galeri</span>
                    </a>

                    {{-- <a href="{{ route('admin.social-media.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.social-media.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-share-alt w-6 text-center mr-2"></i>
                        <span class="font-medium">Media Sosial</span>
                    </a> --}}
                @endcan

                @can('admin')
                    <!-- MANAJEMEN DONASI -->
                    <div class="mt-6 mb-2 px-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Manajemen Donasi</p>
                    </div>

                    <a href="{{ route('admin.donations.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.donations.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-hand-holding-heart w-6 text-center mr-2"></i>
                        <span class="font-medium">Konfirmasi Donasi</span>
                    </a>

                    <a href="{{ route('admin.bank-accounts.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.bank-accounts.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-university w-6 text-center mr-2"></i>
                        <span class="font-medium">Data Rekening</span>
                    </a>

                    <a href="{{ route('admin.settings.qris') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.qris') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-qrcode w-6 text-center mr-2"></i>
                        <span class="font-medium">Pengaturan QRIS</span>
                    </a>

                    <!-- PROGRAM & FASILITAS -->
                    <div class="mt-6 mb-2 px-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Program & Fasilitas</p>
                    </div>

                    <a href="{{ route('admin.programs.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.programs.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-star w-6 text-center mr-2"></i>
                        <span class="font-medium">Program Unggulan</span>
                    </a>

                    <a href="{{ route('admin.schedules.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.schedules.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-calendar-alt w-6 text-center mr-2"></i>
                        <span class="font-medium">Jadwal Harian</span>
                    </a>

                    <a href="{{ route('admin.facilities.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.facilities.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-building w-6 text-center mr-2"></i>
                        <span class="font-medium">Fasilitas Kami</span>
                    </a>

                    <!-- STAKEHOLDER & INTERAKSI -->
                    <div class="mt-6 mb-2 px-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Stakeholder & Interaksi
                        </p>
                    </div>

                    <a href="{{ route('admin.board-members.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.board-members.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-users-cog w-6 text-center mr-2"></i>
                        <span class="font-medium">Struktur Pengurus</span>
                    </a>

                    <a href="{{ route('admin.beneficiaries.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.beneficiaries.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-users w-6 text-center mr-2"></i>
                        <span class="font-medium">Penerima Santunan</span>
                    </a>

                    <a href="{{ route('admin.registrations.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.registrations.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-user-plus w-6 text-center mr-2"></i>
                        <span class="font-medium">Pendaftaran Santri</span>
                    </a>

                    <a href="{{ route('admin.contacts.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-address-book w-6 text-center mr-2"></i>
                        <span class="font-medium">Kontak Pengurus</span>
                    </a>

                    <a href="{{ route('admin.testimonials.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-quote-right w-6 text-center mr-2"></i>
                        <span class="font-medium">Testimoni</span>
                    </a>

                    <a href="{{ route('admin.feedbacks.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.feedbacks.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-comments w-6 text-center mr-2"></i>
                        <span class="font-medium">Kritik & Saran</span>
                    </a>

                    <!-- PROFIL PANTI -->
                    <div class="mt-6 mb-2 px-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Profil Panti</p>
                    </div>

                    <a href="{{ route('admin.settings.about') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.about') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-info-circle w-6 text-center mr-2"></i>
                        <span class="font-medium">Tentang Kami</span>
                    </a>

                    <a href="{{ route('admin.settings.vision-mission') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.vision-mission') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-bullseye w-6 text-center mr-2"></i>
                        <span class="font-medium">Visi & Misi</span>
                    </a>

                    <a href="{{ route('admin.settings.chairman') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.chairman') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-user-tie w-6 text-center mr-2"></i>
                        <span class="font-medium">Sambutan Ketua</span>
                    </a>

                    <a href="{{ route('admin.settings.organization') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.organization') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-map-marker-alt w-6 text-center mr-2"></i>
                        <span class="font-medium">Kontak Organisasi</span>
                    </a>
                @endcan

                @can('manage-users')
                    <!-- SISTEM Section -->
                    <div class="mt-6 mb-2 px-4">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Sistem</p>
                    </div>

                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-300' }}">
                        <i class="fas fa-users w-6 text-center mr-2"></i>
                        <span class="font-medium">Users</span>
                    </a>
                @endcan

                <hr class="my-6 border-gray-700">

                <a href="{{ route('home') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-800 transition text-gray-300"
                    target="_blank">
                    <i class="fas fa-external-link-alt w-6 text-center mr-2"></i>
                    <span class="font-medium">Lihat Website</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="button" onclick="confirmLogout(this.form)"
                        class="flex w-full items-center px-4 py-3 mb-2 rounded-lg hover:bg-red-600 transition text-gray-300 hover:text-white">
                        <i class="fas fa-sign-out-alt w-6 text-center mr-2"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden bg-gray-50">
            <!-- Topbar -->
            <header class="bg-white shadow-sm sticky top-0 z-30">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        @yield('header', 'Dashboard')
                    </h2>
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-bold text-gray-800">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</div>
                        </div>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff"
                            class="w-10 h-10 rounded-full border-2 border-white shadow">
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="p-6 md:p-8">
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                            Toast.fire({
                                icon: 'success',
                                title: '{{ session('success') }}'
                            });
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm rounded-r"
                        role="alert">
                        <p class="font-bold mb-1"><i class="fas fa-exclamation-circle mr-1"></i> Perhatian</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile sidebar toggle
        const btn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');

        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);

        btn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });

        // SweetAlert Delete Confirmation
        window.confirmDelete = function(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }

        // SweetAlert Logout Confirmation
        window.confirmLogout = function(form) {
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: "Anda harus login kembali untuk mengakses halaman ini.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
</body>

</html>
