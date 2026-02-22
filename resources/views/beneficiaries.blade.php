@extends('layouts.app')

@section('title', 'Penerima Santunan')

@section('content')
    <!-- Hero Section -->
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    Penerima Santunan</h1>
            </div>
        </div>
    </section>

    <!-- Beneficiaries List -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">

            <!-- SANTRI DALAM PANTI -->
            <div class="mb-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-[#253C56] uppercase tracking-wider">Daftar Penerima
                        Santunan - Santri Dalam Panti</h2>
                    <div class="mt-2 flex justify-center">
                        <svg width="100" height="10" viewBox="0 0 100 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 5C20 5 30 0 50 5C70 10 80 5 100 5" stroke="#FDB913" stroke-width="3"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#253C56]">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider w-20">
                                        Nomor</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Nama</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($santriDalam as $santri)
                                    <tr class="hover:bg-blue-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-gray-700">
                                            {{ ($santriDalam->currentPage() - 1) * $santriDalam->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800 font-medium">
                                            {{ $santri->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $santri->address }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data
                                            untuk kategori ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    {{ $santriDalam->appends(['luar_page' => $santriLuar->currentPage(), 'lansia_page' => $lansia->currentPage()])->links() }}
                </div>
            </div>

            <!-- SANTRI LUAR PANTI -->
            <div class="mb-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-[#253C56] uppercase tracking-wider">Daftar Penerima
                        Santunan - Santri Luar Panti</h2>
                    <div class="mt-2 flex justify-center">
                        <svg width="100" height="10" viewBox="0 0 100 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 5C20 5 30 0 50 5C70 10 80 5 100 5" stroke="#FDB913" stroke-width="3"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#253C56]">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider w-20">
                                        Nomor</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Nama</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($santriLuar as $santri)
                                    <tr class="hover:bg-blue-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-gray-700">
                                            {{ ($santriLuar->currentPage() - 1) * $santriLuar->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800 font-medium">
                                            {{ $santri->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $santri->address }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data
                                            untuk kategori ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    {{ $santriLuar->appends(['panti_page' => $santriDalam->currentPage(), 'lansia_page' => $lansia->currentPage()])->links() }}
                </div>
            </div>

            <!-- WARGA LANSIA / JOMPO -->
            <div>
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-[#253C56] uppercase tracking-wider">Daftar Penerima
                        Santunan - Warga Lansia / Jompo</h2>
                    <div class="mt-2 flex justify-center">
                        <svg width="100" height="10" viewBox="0 0 100 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 5C20 5 30 0 50 5C70 10 80 5 100 5" stroke="#FDB913" stroke-width="3"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#253C56]">
                                <tr>
                                    <th
                                        class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider w-20">
                                        Nomor</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Nama</th>
                                    <th class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                        Alamat</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($lansia as $orang)
                                    <tr class="hover:bg-blue-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-gray-700">
                                            {{ ($lansia->currentPage() - 1) * $lansia->perPage() + $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800 font-medium">
                                            {{ $orang->name }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $orang->address }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">Belum ada data
                                            untuk kategori ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    {{ $lansia->appends(['panti_page' => $santriDalam->currentPage(), 'luar_page' => $santriLuar->currentPage()])->links() }}
                </div>
            </div>

        </div>
    </section>
@endsection
