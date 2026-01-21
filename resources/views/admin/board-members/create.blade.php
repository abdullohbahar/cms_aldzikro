@extends('layouts.admin')

@section('title', 'Tambah Pengurus')
@section('header', 'Tambah Pengurus')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.board-members.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user text-gray-500 mr-1"></i> Nama Lengkap
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Bapak H. Ahmad Fulan"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-briefcase text-gray-500 mr-1"></i> Jabatan
                </label>
                <input type="text" name="position" id="position" value="{{ old('position') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Ketua Yayasan"
                    required>
                @error('position')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-sort text-gray-500 mr-1"></i> Urutan Tampil
                </label>
                <input type="number" name="order" id="order" value="{{ old('order') ?? 0 }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="0" min="0">
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Semakin kecil angka, semakin atas posisi tampilannya
                </p>
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-eye text-gray-500 mr-1"></i> Aktif
                    </span>
                </label>
                <p class="mt-2 text-sm text-gray-500 ml-6">
                    Hapus centang jika tidak ingin menampilkan pengurus ini di halaman publik
                </p>
                @error('is_active')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
                <a href="{{ route('admin.board-members.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
