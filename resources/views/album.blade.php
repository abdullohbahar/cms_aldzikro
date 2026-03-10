@extends('layouts.app')

@section('title', $album->title)

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    {{ $album->title }}</h1>
                @if ($album->description)
                    <p class="text-white/90 mt-4">{{ $album->description }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="mb-6">
                <a href="{{ route('gallery') }}" class="text-primary hover:text-accent inline-flex items-center font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @forelse($album->children as $item)
                    <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                        @if ($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}"
                                class="w-full h-64 object-cover cursor-pointer" alt="{{ $item->title }}"
                                onclick="openLightbox('{{ asset('storage/' . $item->image_path) }}')">
                        @endif
                        <div class="p-4">
                            <h3 class="font-medium">{{ $item->title }}</h3>
                            @if ($item->description)
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
    </section>

    <!-- Simple Lightbox -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50" onclick="closeLightbox()">
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
