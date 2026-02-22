@extends('layouts.app')

@section('title', 'Panduan Donasi')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    Panduan Donasi</h1>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-16 items-start">
                <div class="lg:col-span-5">
                    <h2 class="text-3xl md:text-4xl font-black text-primary leading-tight uppercase mb-4">
                        Bagaimana cara<br>donasi?
                    </h2>
                    <div class="w-16 h-1 bg-accent mb-6 relative">
                        {{-- Squiggle effect placeholder --}}
                        <svg width="60" height="10" viewBox="0 0 60 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="absolute -bottom-1">
                            <path
                                d="M1 9C3.5 9 5 1 7.5 1C10 1 11.5 9 14 9C16.5 9 18 1 20.5 1C23 1 24.5 9 27 9C29.5 9 31 1 33.5 1C36 1 37.5 9 40 9C42.5 9 44 1 46.5 1C49 1 50.5 9 53 9C55.5 9 57 1 59.5 1"
                                stroke="#FBBF24" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <div class="text-secondary space-y-4">
                        <p>Terima kasih atas niat baik Bapak/Ibu/Saudara untuk berbagi dan mendukung kegiatan sosial di
                            Yayasan Al Dzikro.</p>
                        <p>Donasi yang Anda berikan akan sangat berarti bagi kelangsungan pendidikan, pemenuhan kebutuhan
                            sehari-hari, serta pembinaan spiritual anak-anak asuh kami.</p>
                        <p>Untuk mempermudah proses penyaluran donasi, berikut panduan singkat yang dapat diikuti:</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card 1 --}}
                <div class="bg-[#4B6B90] text-white p-8 rounded-2xl shadow-lg flex flex-col h-full">
                    <div class="text-5xl font-black mb-6 opacity-80">1</div>
                    <h3 class="text-xl font-bold mb-6">Transfer Bank</h3>
                    <div class="space-y-4 text-sm leading-relaxed">
                        <p>Silakan kirimkan donasi ke rekening berikut:</p>
                        @forelse($bankAccounts as $bank)
                            <div class="font-bold border-b border-white/10 pb-4 mb-4 last:border-0 last:pb-0 last:mb-0">
                                <p>{{ $bank->bank_name }}</p>
                                <p>No. Rekening: {{ $bank->account_number }}</p>
                                <p>a.n. {{ $bank->account_holder }}</p>
                            </div>
                        @empty
                            <div class="font-bold">
                                <p>[Nama Bank]</p>
                                <p>No. Rekening: [Nomor Rekening]</p>
                                <p>a.n. Yayasan Panti Asuhan Al Dzikro</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="bg-[#4B6B90] text-white p-8 rounded-2xl shadow-lg flex flex-col h-full">
                    <div class="text-5xl font-black mb-6 opacity-80">2</div>
                    <h3 class="text-xl font-bold mb-6">Konfirmasi Donasi</h3>
                    <div class="space-y-4 text-sm leading-relaxed">
                        <p>Setelah melakukan transfer, mohon konfirmasi melalui:</p>
                        <ul class="space-y-2">
                            <li>— WhatsApp: <span class="font-bold">{{ $phone }}</span></li>
                        </ul>
                        <p>Sertakan bukti transfer, nama, dan tujuan donasi (misalnya: infak, sedekah, bantuan pendidikan,
                            dll)</p>
                        <p class="mt-4 pt-4 border-t border-white/20">
                            Atau anda bisa konfirmasi melalui >> <a href="{{ route('contact') }}"
                                class="underline hover:text-accent font-bold">halaman ini</a>
                            << </p>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="bg-[#4B6B90] text-white p-8 rounded-2xl shadow-lg flex flex-col h-full">
                    <div class="text-5xl font-black mb-6 opacity-80">3</div>
                    <h3 class="text-xl font-bold mb-6">Donasi Langsung</h3>
                    <div class="space-y-4 text-sm leading-relaxed flex-grow">
                        <p>Anda juga dapat menyalurkan donasi langsung ke alamat kami:</p>
                        <p class="font-bold">{{ $address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
