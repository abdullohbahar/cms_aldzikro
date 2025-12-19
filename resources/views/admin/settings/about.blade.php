@extends('layouts.admin')

@section('title', 'Tentang Kami')
@section('header', 'Pengaturan Tentang Kami')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                Konten Halaman Tentang Kami
            </h3>
            <p class="text-sm text-gray-600">Isi informasi umum tentang organisasi Anda</p>
        </div>

        <form action="{{ route('admin.settings.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="about_image" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-image text-gray-500 mr-1"></i> Gambar Header
                </label>
                @if($image)
                    <div class="mb-3 relative inline-block">
                        <img src="{{ asset('storage/' . $image) }}" alt="About Image" class="h-48 w-auto object-cover rounded-lg shadow-md border-2 border-gray-200">
                        <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded text-xs">
                            <i class="fas fa-check mr-1"></i> Tersimpan
                        </div>
                    </div>
                @else
                    <div class="mb-3 p-4 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg text-center">
                        <i class="fas fa-image text-gray-400 text-3xl mb-2"></i>
                        <p class="text-sm text-gray-500">Belum ada gambar</p>
                    </div>
                @endif
                <input type="file" name="about_image" id="about_image" accept="image/*" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Format: JPG, PNG, GIF. Maksimal 2MB
                </p>
                @error('about_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="about_content" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-file-alt text-gray-500 mr-1"></i> Konten Utama
                </label>
                <textarea name="about_content" id="about_content" rows="8" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>{{ old('about_content', $content) }}</textarea>
                @error('about_content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
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

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about_content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
