@extends('layouts.admin')

@section('title', 'Detail Album')
@section('header', 'Detail Album')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galleries.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center mb-4">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
    </a>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/3 bg-gray-100 h-64 md:h-auto relative">
                @if($gallery->image_path)
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                        <i class="fas fa-images fa-4x"></i>
                    </div>
                @endif
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $gallery->title }}</h2>
                        <p class="text-gray-600">{{ $gallery->description ?? 'Tidak ada deskripsi' }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="bg-blue-50 text-blue-600 p-2 rounded-lg hover:bg-blue-100 transition" title="Edit Album">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-100 grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Total Item</span>
                        <p class="text-xl font-bold text-gray-800">{{ $gallery->children->count() }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Dibuat Pada</span>
                        <p class="text-lg font-medium text-gray-800">{{ $gallery->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-between items-center mb-6 mt-8">
    <h3 class="text-xl font-bold text-gray-800">Foto dalam Album</h3>
    <a href="{{ route('admin.galleries.create', ['parent_id' => $gallery->id]) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Foto
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($gallery->children as $item)
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition">
        <div class="relative h-48 bg-gray-100 cursor-pointer overflow-hidden">
            @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-300">
                    <i class="fas fa-image fa-2x"></i>
                </div>
            @endif
            
            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100 gap-2">
                <a href="{{ route('admin.galleries.edit', $item) }}" class="bg-white text-blue-600 p-2 rounded-full shadow hover:bg-gray-100 transition" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST" class="inline" onsubmit="confirmDelete(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-white text-red-600 p-2 rounded-full shadow hover:bg-gray-100 transition" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @if($item->title || $item->description)
        <div class="p-3">
            @if($item->title)
            <h5 class="font-medium text-gray-800 truncate">{{ $item->title }}</h5>
            @endif
            @if($item->description)
            <p class="text-xs text-gray-500 truncate">{{ $item->description }}</p>
            @endif
        </div>
        @endif
    </div>
    @empty
    <div class="col-span-full py-12 text-center bg-white rounded-xl border border-dashed border-gray-300">
        <p class="text-gray-500">Belum ada foto dalam album ini.</p>
        <a href="{{ route('admin.galleries.create', ['parent_id' => $gallery->id]) }}" class="text-blue-600 hover:underline mt-2 inline-block">
            Upload foto sekarang
        </a>
    </div>
    @endforelse
</div>
@endsection
