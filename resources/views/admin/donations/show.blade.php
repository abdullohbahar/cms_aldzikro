@extends('layouts.admin')

@section('title', 'Detail Konfirmasi Donasi')
@section('header', 'Detail Konfirmasi Donasi')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.donations.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Info --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Informasi Donatur</h3>
                    <span class="text-sm text-gray-500">ID: #{{ $donation->id }}</span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                            <p class="text-gray-900 font-medium">{{ $donation->name }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Nomor HP /
                                WhatsApp</label>
                            <p class="text-gray-900 font-medium">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $donation->phone) }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    <i class="fab fa-whatsapp text-green-500 mr-1"></i> {{ $donation->phone }}
                                </a>
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Alamat</label>
                            <p class="text-gray-900">{{ $donation->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Detail Donasi</h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-100">
                        <div>
                            <label class="block text-xs font-semibold text-blue-500 uppercase mb-1">Jumlah Donasi</label>
                            <p class="text-2xl font-black text-primary">Rp
                                {{ number_format(str_replace(['.', ','], '', $donation->amount), 0, ',', '.') }}</p>
                        </div>
                        <i class="fas fa-hand-holding-heart text-4xl text-blue-200"></i>
                    </div>

                    @if ($donation->items)
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Barang yang
                                Didonasikan</label>
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 text-gray-900">
                                {{ $donation->items }}
                            </div>
                        </div>
                    @endif

                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Waktu Konfirmasi</label>
                        <p class="text-gray-900">{{ $donation->created_at->format('d F Y - H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar / Actions --}}
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Status & Aksi</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.donations.update', $donation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Perbarui
                                Status</label>
                            <select name="status" id="status"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="verified" {{ $donation->status == 'verified' ? 'selected' : '' }}>Verified
                                    (Diterima)</option>
                                <option value="cancelled" {{ $donation->status == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition shadow-md">
                            Update Status
                        </button>
                    </form>

                    <hr class="my-6">

                    <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2 px-4 rounded-lg border border-red-200 transition">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus Selamanya
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-blue-600 rounded-lg shadow p-6 text-white text-center">
                <i class="fas fa-info-circle text-4xl mb-4 opacity-50"></i>
                <p class="text-sm font-medium opacity-90 mb-4">Pastikan Anda telah memeriksa mutasi rekening sebelum
                    melakukan verifikasi.</p>
                <a href="{{ route('admin.bank-accounts.index') }}"
                    class="inline-block bg-white text-blue-600 px-4 py-2 rounded-full font-bold text-xs uppercase tracking-wider hover:bg-gray-100 transition">
                    Cek Data Rekening
                </a>
            </div>
        </div>
    </div>
@endsection
