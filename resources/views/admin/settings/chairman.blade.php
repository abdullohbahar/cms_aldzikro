@extends('layouts.admin')

@section('title', 'Sambutan Ketua')
@section('header', 'Pengaturan Sambutan Ketua')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <i class="fas fa-user-tie text-blue-600 mr-2"></i>
                Sambutan Ketua
            </h3>
            <p class="text-sm text-gray-600">Kelola video dan keterangan sambutan ketua</p>
        </div>

        <form action="{{ route('admin.settings.chairman.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Video Type Selection -->
            <div class="mb-6 p-6 bg-gray-50 rounded-lg border border-gray-200">
                <label class="block text-sm font-semibold text-gray-800 mb-4">
                    <i class="fas fa-video text-gray-600 mr-2"></i> Pilih Tipe Video
                </label>
                
                <div class="flex gap-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="chairman_video_type" value="embed" 
                            {{ old('chairman_video_type', $videoType) === 'embed' ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                        <span class="ml-3 text-base">
                            <i class="fab fa-youtube text-red-600 mr-1"></i> Embed YouTube
                        </span>
                    </label>
                    
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="chairman_video_type" value="upload" 
                            {{ old('chairman_video_type', $videoType) === 'upload' ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                        <span class="ml-3 text-base">
                            <i class="fas fa-upload text-blue-600 mr-1"></i> Upload Video
                        </span>
                    </label>
                </div>
                @error('chairman_video_type')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Embed YouTube Section -->
            <div id="embed-section" class="mb-6 p-6 bg-red-50 rounded-lg border-l-4 border-red-600" 
                 style="display: {{ old('chairman_video_type', $videoType) === 'embed' ? 'block' : 'none' }};">
                <label for="chairman_video_url" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fab fa-youtube text-red-600 mr-2"></i> URL YouTube
                </label>
                <input type="url" name="chairman_video_url" id="chairman_video_url" 
                    value="{{ old('chairman_video_url', $videoUrl) }}" 
                    placeholder="https://www.youtube.com/watch?v=..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 text-base">
                <p class="mt-2 text-sm text-gray-600">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Paste link YouTube lengkap (contoh: https://www.youtube.com/watch?v=xxxxx)
                </p>
                @error('chairman_video_url')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror

                <!-- YouTube Preview -->
                @if($videoUrl && $videoType === 'embed')
                    <div class="mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                        <div class="aspect-video bg-black rounded-lg overflow-hidden">
                            <iframe width="100%" height="100%" 
                                src="{{ str_replace('watch?v=', 'embed/', $videoUrl) }}" 
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Upload Video Section -->
            <div id="upload-section" class="mb-6 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-600" 
                 style="display: {{ old('chairman_video_type', $videoType) === 'upload' ? 'block' : 'none' }};">
                <label for="chairman_video_file" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-upload text-blue-600 mr-2"></i> Upload File Video
                </label>

                @if($videoPath && $videoType === 'upload')
                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Video Saat Ini:</p>
                        <video controls class="w-full max-w-2xl rounded-lg shadow-md border-2 border-gray-200">
                            <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                        <div class="mt-2 inline-flex items-center bg-green-500 text-white px-3 py-1 rounded text-sm">
                            <i class="fas fa-check mr-1"></i> Video tersimpan
                        </div>
                    </div>
                @endif

                <input type="file" name="chairman_video_file" id="chairman_video_file" 
                    accept="video/mp4,video/mov,video/avi,video/wmv"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="mt-2 text-sm text-gray-600">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Format: MP4, MOV, AVI, WMV. Maksimal 50MB
                </p>
                @error('chairman_video_file')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Description Section -->
            <div class="mb-6 p-6 bg-green-50 rounded-lg border-l-4 border-green-600">
                <label for="chairman_description" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-comment-alt text-green-600 mr-2"></i> Keterangan Sambutan
                </label>
                <textarea name="chairman_description" id="chairman_description" rows="6" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-base">{{ old('chairman_description', $description) }}</textarea>
                @error('chairman_description')
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

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    // CKEditor for Description
    ClassicEditor
        .create(document.querySelector('#chairman_description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });

    // Toggle between Embed and Upload sections
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="chairman_video_type"]');
        const embedSection = document.getElementById('embed-section');
        const uploadSection = document.getElementById('upload-section');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'embed') {
                    embedSection.style.display = 'block';
                    uploadSection.style.display = 'none';
                } else {
                    embedSection.style.display = 'none';
                    uploadSection.style.display = 'block';
                }
            });
        });
    });
</script>
@endsection
