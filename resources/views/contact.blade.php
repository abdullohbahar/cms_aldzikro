@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Hubungi Kami</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            {{-- Contact Information --}}
            <div>
                <h2 class="section-title mb-6">Informasi Kontak</h2>
                
                {{-- Organization Contact --}}
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-primary mb-4">Yayasan Al-Dzikro</h3>
                    
                    @if($orgAddress)
                    <div class="flex items-start mb-4">
                        <i class="fas fa-map-marker-alt text-primary mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Alamat</p>
                            <p class="text-secondary">{{ $orgAddress }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($orgEmail)
                    <div class="flex items-start mb-4">
                        <i class="fas fa-envelope text-primary mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Email</p>
                            <a href="mailto:{{ $orgEmail }}" class="text-secondary hover:text-primary">{{ $orgEmail }}</a>
                        </div>
                    </div>
                    @endif
                    
                    @if($orgPhone)
                    <div class="flex items-start">
                        <i class="fas fa-phone text-primary mt-1 mr-3"></i>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Telepon</p>
                            <a href="tel:{{ $orgPhone }}" class="text-secondary hover:text-primary">{{ $orgPhone }}</a>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Staff Contacts --}}
                @if($contacts->count() > 0)
                <h3 class="text-lg font-bold text-primary mb-4">Kontak Staff</h3>
                <div class="space-y-3">
                    @foreach($contacts as $contact)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="font-semibold text-gray-800">{{ $contact->name }}</p>
                        <div class="mt-2 space-y-1 text-sm">
                            <p class="text-secondary"><i class="fas fa-phone text-primary mr-2"></i>{{ $contact->phone }}</p>
                            <p class="text-secondary"><i class="fas fa-envelope text-primary mr-2"></i>{{ $contact->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Feedback Form --}}
            <div>
                <h2 class="section-title mb-6">Kirim Pesan</h2>
                
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
                @endif
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user text-primary mr-1"></i> Nama
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Nama lengkap Anda">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-phone text-primary mr-1"></i> Nomor Telepon
                            </label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="08xxxxxxxxxx">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-comment text-primary mr-1"></i> Pesan
                            </label>
                            <textarea name="message" id="message" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Tulis pesan Anda...">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full btn btn-primary">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Donation Section --}}
        <div class="mt-12">
            <h2 class="section-title text-center mb-6">Informasi Donasi</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Bank Accounts --}}
                @if($bankAccounts->count() > 0)
                <div>
                    <h3 class="text-lg font-bold text-primary mb-4">Rekening Donasi</h3>
                    <div class="space-y-4">
                        @foreach($bankAccounts as $account)
                        <div class="bg-white rounded-lg shadow-md p-5 border-l-4 border-primary">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600 mb-1">{{ $account->bank_name }}</p>
                                    <p class="text-xl font-bold text-primary font-mono">{{ $account->account_number }}</p>
                                    <p class="text-gray-700 mt-2 font-semibold">a.n. {{ $account->account_name }}</p>
                                </div>
                                <div class="ml-4">
                                    <button onclick="copyToClipboard('{{ $account->account_number }}')" 
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition">
                                        <i class="fas fa-copy mr-1"></i> Salin
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- QRIS --}}
                @if($qrisImage)
                <div>
                    <h3 class="text-lg font-bold text-primary mb-4">Scan QRIS</h3>
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <img src="{{ asset('storage/' . $qrisImage) }}" 
                             alt="QRIS Donasi" 
                             class="max-w-xs mx-auto rounded-lg border-2 border-gray-200">
                        <p class="mt-4 text-sm text-gray-600">
                            <i class="fas fa-qrcode text-primary mr-1"></i>
                            Scan QR Code untuk donasi via e-wallet
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- Map Section --}}
        <div class="mt-12">
            <h2 class="section-title text-center mb-6">Lokasi Kami</h2>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d87682.14192642561!2d110.391643!3d-7.908523000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a547000000001%3A0xba21a4fb2bd5da11!2sAl%20Dzikro%20Yogyakarta!5e1!3m2!1sen!2sus!4v1766325336538!5m2!1sen!2sus" 
                    class="w-full h-96" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
        toast.innerHTML = '<i class="fas fa-check-circle mr-2"></i>Nomor rekening berhasil disalin!';
        document.body.appendChild(toast);
        
        // Remove toast after 3 seconds
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }, function(err) {
        alert('Gagal menyalin nomor rekening');
    });
}
</script>
@endsection
