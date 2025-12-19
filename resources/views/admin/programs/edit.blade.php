@extends('layouts.admin')

@section('title', 'Edit Program')
@section('header', 'Edit Program Unggulan')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag text-gray-500 mr-1"></i> Nama Program
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $program->name) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-image text-gray-500 mr-1"></i> Gambar Program
                </label>

                <!-- Current Image -->
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $program->image_path) }}" 
                         alt="{{ $program->name }}" 
                         class="max-w-xs rounded-lg shadow-md border-2 border-gray-200"
                         id="currentImage">
                    <div class="mt-2 inline-flex items-center bg-green-500 text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-check mr-1"></i> Tersimpan
                    </div>
                </div>

                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="previewImage(event)">
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG. Maksimal 2MB
                </p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- New Image Preview -->
                <div id="newImagePreview" class="mt-4 hidden">
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru:</p>
                    <img id="preview" class="max-w-xs rounded-lg shadow-md border-2 border-blue-400">
                </div>
            </div>

            <!-- Sub Programs Section -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center justify-between mb-3">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-list-ul text-gray-500 mr-1"></i> Sub-Program
                    </label>
                    <button type="button" onclick="addSubProgram()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Sub-Program
                    </button>
                </div>
                
                <div id="subProgramContainer">
                    @foreach($program->subPrograms as $subProgram)
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="sub_programs[]" value="{{ $subProgram->name }}"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            placeholder="Nama Sub-Program">
                        <button type="button" onclick="this.parentElement.remove()" 
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.programs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function addSubProgram() {
        const container = document.getElementById('subProgramContainer');
        const div = document.createElement('div');
        div.className = 'flex gap-2 mb-2';
        div.innerHTML = `
            <input type="text" name="sub_programs[]" 
                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Nama Sub-Program">
            <button type="button" onclick="this.parentElement.remove()" 
                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('newImagePreview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('newImagePreview').classList.add('hidden');
        }
    }
</script>
@endsection
