@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Galeri Foto</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($albums as $album)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                @if($album->image_path)
                    <img src="{{ asset('storage/' . $album->image_path) }}" class="w-full h-64 object-cover" alt="{{ $album->title }}">
                @else
                    <div class="w-full h-64 bg-gradient-to-br from-primary to-accent flex items-center justify-center">
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
                        <a href="{{ route('album.show', $album->id) }}" class="text-primary hover:text-accent font-medium">
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
</section>
@endsection
