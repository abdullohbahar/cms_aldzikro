@extends('layouts.admin')

@section('title', 'Kontak Organisasi')
@section('header', 'Pengaturan Kontak Organisasi')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i>
                Informasi Kontak Organisasi
            </h3>
            <p class="text-sm text-gray-600">Isi informasi kontak organisasi Anda</p>
        </div>

        <form action="{{ route('admin.settings.organization.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Address Section -->
            <div class="mb-6 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-600">
                <label for="organization_address" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-map-marker-alt text-blue-600 mr-2"></i> Alamat
                </label>
                <textarea name="organization_address" id="organization_address" rows="3" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-base" 
                    placeholder="Jl. Contoh No. 123, Jakarta Selatan" 
                    required>{{ old('organization_address', $address) }}</textarea>
                @error('organization_address')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email Section -->
            <div class="mb-6 p-6 bg-green-50 rounded-lg border-l-4 border-green-600">
                <label for="organization_email" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-envelope text-green-600 mr-2"></i> Email
                </label>
                <input type="email" name="organization_email" id="organization_email" 
                    value="{{ old('organization_email', $email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-base"
                    placeholder="info@example.com"
                    required>
                @error('organization_email')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Phone Section -->
            <div class="mb-6 p-6 bg-purple-50 rounded-lg border-l-4 border-purple-600">
                <label for="organization_phone" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-phone text-purple-600 mr-2"></i> Nomor Telepon
                </label>
                <input type="text" name="organization_phone" id="organization_phone" 
                    value="{{ old('organization_phone', $phone) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-base"
                    placeholder="021-12345678"
                    required>
                @error('organization_phone')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
