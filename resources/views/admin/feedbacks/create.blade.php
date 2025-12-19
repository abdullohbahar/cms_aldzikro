@extends('layouts.admin')

@section('title', 'Tambah Kritik & Saran')
@section('header', 'Tambah Kritik & Saran')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.feedbacks.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user text-gray-500 mr-1"></i> Nama
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Nama pengirim"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-phone text-gray-500 mr-1"></i> Nomor HP
                </label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="081234567890"
                    required>
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-comment-alt text-gray-500 mr-1"></i> Pesan
                </label>
                <textarea name="message" id="message" rows="6" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Tulis kritik atau saran Anda..."
                    required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
                <a href="{{ route('admin.feedbacks.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
