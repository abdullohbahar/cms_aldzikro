@extends('layouts.admin')

@section('title', 'Galeri')
@section('header', 'Manajemen Galeri')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Galeri Foto</h3>
            <p class="text-sm text-gray-500">Kelola album dan foto kegiatan</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Album
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition group">
                <div class="relative h-48 bg-gray-100">
                    @if ($gallery->image_path)
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <i class="fas fa-images fa-3x"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-300"></div>

                    <!-- Action Buttons Overlay -->
                    <div
                        class="absolute top-2 right-2 flex gap-2 opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}"
                            class="bg-white p-2 rounded-lg shadow text-blue-600 hover:text-blue-700" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline"
                            onsubmit="confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-white p-2 rounded-lg shadow text-red-600 hover:text-red-700"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="p-5">
                    <h4 class="text-lg font-bold text-gray-800 mb-1 truncate">{{ $gallery->title }}</h4>
                    <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $gallery->description ?? 'Tidak ada deskripsi' }}
                    </p>

                    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                        <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-1 rounded">
                            <i class="fas fa-photo-video mr-1"></i> {{ $gallery->children_count }} Foto
                        </span>
                        <a href="{{ route('admin.galleries.show', $gallery) }}"
                            class="text-sm font-medium text-blue-600 hover:text-blue-500 flex items-center">
                            Lihat Album <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center bg-white rounded-xl border border-dashed border-gray-300">
                <div class="text-gray-400 mb-3">
                    <i class="fas fa-images text-5xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900">Belum ada album</h3>
                <p class="text-gray-500 mb-4">Mulai dokumentasi kegiatan dengan membuat album baru.</p>
                <a href="{{ route('admin.galleries.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> Buat Album Pertama
                </a>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $galleries->links() }}
    </div>
@endsection
