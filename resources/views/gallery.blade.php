@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-16">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold">Galeri Foto</h1>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($albums as $album)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
            @if($album->image_path)
                <img src="{{ asset('storage/' . $album->image_path) }}" class="w-full h-64 object-cover" alt="{{ $album->title }}">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center">
                    <span class="text-white text-6xl">📁</span>
                </div>
            @endif
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2">{{ $album->title }}</h3>
                @if($album->description)
                    <p class="text-gray-600 mb-4">{{ Str::limit($album->description, 100) }}</p>
                @endif
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">{{ $album->children_count }} foto</span>
                    <a href="{{ route('album.show', $album->id) }}" class="text-purple-600 hover:text-purple-800 font-medium">
                        Lihat Album →
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 text-gray-500">
            Belum ada album
        </div>
        @endforelse
    </div>
</div>
@endsection
