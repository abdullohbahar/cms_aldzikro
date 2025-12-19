@extends('layouts.admin')

@section('title', 'Tambah Program')
@section('header', 'Tambah Program Unggulan')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag text-gray-500 mr-1"></i> Nama Program
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Contoh: Program Tahfidz"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-image text-gray-500 mr-1"></i> Gambar Program
                </label>
                <input type="file" name="image" id="image" accept="image/*" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="previewImage(event)">
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Format: JPG, PNG. Maksimal 2MB
                </p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Image Preview -->
                <div id="imagePreview" class="mt-4 hidden">
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                    <img id="preview" class="max-w-xs rounded-lg shadow-md border-2 border-gray-200">
                </div>
            </div>

            <!-- Sub Programs Section -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center justify-between mb-3">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-list-ul text-gray-500 mr-1"></i> Sub-Program (Opsional)
                    </label>
                    <button type="button" onclick="addSubProgram()" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Sub-Program
                    </button>
                </div>
                
                <div id="subProgramContainer"></div>
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
                <a href="{{ route('admin.programs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    let subProgramCount = 0;

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
        subProgramCount++;
    }

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

    // Add one sub-program field by default
    addSubProgram();
</script>
@endsection
