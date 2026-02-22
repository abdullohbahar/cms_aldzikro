@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    Donasi</h1>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                {{-- Left Column: Form --}}
                <div class="lg:col-span-8 bg-white p-8 md:p-12 rounded-3xl shadow-xl">
                    <h2 class="text-2xl md:text-3xl font-black text-primary uppercase mb-10 tracking-tight">
                        Konfirmasi Transfer Donasi
                    </h2>

                    <form action="{{ route('donasi.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-bold text-secondary mb-2">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 transition-colors duration-300"
                                required>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-bold text-secondary mb-2">Nomor HP</label>
                            <input type="text" name="phone" id="phone"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 transition-colors duration-300"
                                required>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-bold text-secondary mb-2">Alamat</label>
                            <textarea name="address" id="address" rows="4"
                                class="w-full border-2 border-gray-100 focus:border-accent outline-none p-3 rounded-xl transition-colors duration-300 resize-none"
                                required></textarea>
                        </div>

                        <div>
                            <label for="amount" class="block text-sm font-bold text-secondary mb-2">Jumlah Donasi</label>
                            <input type="text" name="amount" id="amount"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 transition-colors duration-300"
                                placeholder="Contoh: 100.000">
                        </div>

                        <div>
                            <label for="items" class="block text-sm font-bold text-secondary mb-2">Nama Barang</label>
                            <input type="text" name="items" id="items"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 transition-colors duration-300"
                                placeholder="Isi jika donasi berupa barang">
                        </div>

                        <div class="pt-6">
                            <button type="submit"
                                class="w-full bg-primary text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-[#324b6b] transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Right Column: Bank Details & QRIS --}}
                <div class="lg:col-span-4 space-y-8">
                    {{-- Bank Account Box --}}
                    <div class="bg-accent rounded-3xl p-8 shadow-lg text-primary">
                        <h3 class="font-black uppercase text-sm mb-6 pb-2 border-b border-primary/20 tracking-widest">
                            Donasi ke Rekening:
                        </h3>

                        <div class="space-y-6">
                            @forelse($bankAccounts as $bank)
                                <div class="font-secondary">
                                    <p class="font-black text-lg">{{ $bank->bank_name }}</p>
                                    <p class="font-bold opacity-80">A.n. {{ $bank->account_holder }}</p>
                                    <p class="text-xl font-black mt-1">{{ $bank->account_number }}</p>
                                </div>
                            @empty
                                <div class="font-secondary">
                                    <p class="font-black text-lg">Bank BRI</p>
                                    <p class="font-bold opacity-80">A.n. Yayasan Al Dzikro/Turmudi</p>
                                    <p class="text-xl font-black mt-1">358501005042537</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- QRIS Section --}}
                    <div class="bg-white rounded-3xl p-8 shadow-xl text-center">
                        <h3 class="font-black uppercase text-sm mb-6 tracking-widest text-primary">
                            Atau Scan QRIS
                        </h3>

                        <div class="aspect-square bg-gray-50 rounded-2xl overflow-hidden mb-4 border-2 border-gray-100">
                            @if ($qrisImage)
                                <img src="{{ asset('storage/' . $qrisImage) }}" alt="QRIS Al Dzikro"
                                    class="w-full h-full object-contain p-2">
                            @else
                                {{-- Fallback image if QRIS not set --}}
                                <div class="flex items-center justify-center h-full text-secondary italic text-sm p-4">
                                    QRIS belum diunggah
                                </div>
                            @endif
                        </div>

                        <p class="text-xs text-secondary font-bold uppercase tracking-tight">
                            Yayasan Al Dzikro
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
