@extends('layouts.app')

@section('title', $album->title)

@section('content')
<div class="container mx-auto px-6 py-12">
    <a href="{{ route('gallery') }}" class="text-purple-600 hover:text-purple-800 mb-6 inline-block">← Kembali ke Galeri</a>
    
    <div class="mb-8">
        <h1 class="text-4xl font-bold mb-4">{{ $album->title }}</h1>
        @if($album->description)
            <p class="text-gray-600">{{ $album->description }}</p>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @forelse($album->children as $item)
        <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
            @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-64 object-cover cursor-pointer" alt="{{ $item->title }}" onclick="openLightbox('{{ asset('storage/' . $item->image_path) }}')">
            @endif
            <div class="p-4">
                <h3 class="font-medium">{{ $item->title }}</h3>
                @if($item->description)
                    <p class="text-sm text-gray-600 mt-1">{{ $item->description }}</p>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-12 text-gray-500">
            Album ini belum memiliki foto
        </div>
        @endforelse
    </div>
</div>

<!-- Simple Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 hidden items-center justify-center z-50" onclick="closeLightbox()">
    <img id="lightbox-img" src="" class="max-w-full max-h-full">
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
}
</script>
@endsection
