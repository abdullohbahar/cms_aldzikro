@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-4">Selamat Datang di CMS Panti</h1>
        <p class="text-xl">Platform manajemen konten sederhana dan powerful</p>
    </div>
</div>

<!-- Articles Section -->
<div class="container mx-auto px-6 py-12">
    <!-- Search Bar -->
    <div class="mb-8">
        <form action="{{ route('home') }}" method="GET" class="max-w-2xl mx-auto">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari artikel..." 
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                    🔍 Cari
                </button>
                @if(request('search'))
                <a href="{{ route('home') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    ✕
                </a>
                @endif
            </div>
        </form>
    </div>

    <h2 class="text-3xl font-bold mb-8">
        @if(request('search'))
            Hasil Pencarian: "{{ request('search') }}"
        @else
            Artikel Terbaru
        @endif
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($articles as $article)
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
            @if($article->image_path)
                <img src="{{ asset('storage/' . $article->image_path) }}" class="w-full h-48 object-cover" alt="{{ $article->title }}">
            @else
                <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
            @endif
            <div class="p-6">
                <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $article->category->name }}</span>
                    <span>•</span>
                    <span>{{ $article->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">{{ $article->title }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                <a href="{{ route('article.show', $article->slug) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Baca Selengkapnya →
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-3 text-center py-12 text-gray-500">
            Belum ada artikel yang dipublikasikan
        </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</div>
@endsection
