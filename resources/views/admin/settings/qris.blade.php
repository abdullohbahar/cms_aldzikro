@extends('layouts.admin')

@section('title', 'QRIS')
@section('header', 'Upload QRIS')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <i class="fas fa-qrcode text-blue-600 mr-2"></i>
                Upload Gambar QRIS
            </h3>
            <p class="text-sm text-gray-600">Upload gambar QRIS untuk pembayaran/donasi</p>
        </div>

        <form action="{{ route('admin.settings.qris.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Current QRIS Image -->
            @if($qrisImage)
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <p class="text-sm font-medium text-gray-700 mb-3">QRIS Saat Ini:</p>
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $qrisImage) }}" 
                         alt="QRIS" 
                         class="max-w-md rounded-lg shadow-md border-2 border-gray-200">
                </div>
                <div class="mt-3 inline-flex items-center bg-green-500 text-white px-3 py-1 rounded text-sm">
                    <i class="fas fa-check mr-1"></i> QRIS tersimpan
                </div>
            </div>
            @endif

            <!-- Upload QRIS Section -->
            <div class="mb-6 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-600">
                <label for="qris_image" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-upload text-blue-600 mr-2"></i> Upload Gambar QRIS {{ $qrisImage ? 'Baru' : '' }}
                </label>
                
                <input type="file" name="qris_image" id="qris_image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="previewImage(event)">
                
                <p class="mt-2 text-sm text-gray-600">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Format: JPG, PNG. Maksimal 2MB
                </p>
                
                @error('qris_image')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror

                <!-- Image Preview -->
                <div id="imagePreview" class="mt-4 hidden">
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru:</p>
                    <div class="flex justify-center">
                        <img id="preview" class="max-w-md rounded-lg shadow-md border-2 border-blue-400">
                    </div>
                </div>
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan QRIS
                </button>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
