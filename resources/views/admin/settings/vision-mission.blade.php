@extends('layouts.admin')

@section('title', 'Visi & Misi')
@section('header', 'Pengaturan Visi, Tujuan & Misi')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                <i class="fas fa-bullseye text-blue-600 mr-2"></i>
                Visi, Tujuan & Misi Organisasi
            </h3>
            <p class="text-sm text-gray-600">Isi visi, tujuan, dan misi organisasi Anda</p>
        </div>

        <form action="{{ route('admin.settings.vision-mission.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Visi Section -->
            <div class="mb-6 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-600">
                <label for="about_vision" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-eye text-blue-600 mr-2"></i> Visi
                </label>
                <textarea name="about_vision" id="about_vision" rows="4" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-base">{{ old('about_vision', $vision) }}</textarea>
                @error('about_vision')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Misi Section -->
            <div class="mb-6 p-6 bg-cyan-50 rounded-lg border-l-4 border-cyan-600">
                <label for="about_mission" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-tasks text-cyan-600 mr-2"></i> Misi
                </label>
                <textarea name="about_mission" id="about_mission" rows="8" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-base">{{ old('about_mission', $mission) }}</textarea>
                @error('about_mission')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tujuan Section -->
            <div class="mb-6 p-6 bg-purple-50 rounded-lg border-l-4 border-purple-600">
                <label for="about_purpose" class="block text-base font-semibold text-gray-800 mb-3">
                    <i class="fas fa-crosshairs text-purple-600 mr-2"></i> Tujuan
                </label>
                <textarea name="about_purpose" id="about_purpose" rows="4" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 text-base">{{ old('about_purpose', $purpose) }}</textarea>
                @error('about_purpose')
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
    // CKEditor for Visi
    ClassicEditor
        .create(document.querySelector('#about_vision'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });

    // CKEditor for Tujuan
    ClassicEditor
        .create(document.querySelector('#about_purpose'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });

    // CKEditor for Misi
    ClassicEditor
        .create(document.querySelector('#about_mission'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
