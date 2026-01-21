@extends('layouts.app')

@section('title', $article->title)

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-2xl md:text-4xl text-center md:text-start lg:text-5xl">{{ $article->title }}</h1>
        </div>
    </div>
</section>

{{-- Breadcrumb --}}
<div class="bg-[#F3F3F3]">
    <div class="container py-4">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('home') }}" class="text-secondary hover:text-primary transition">
                <i class='bx bx-home-alt-2'></i> Beranda
            </a>
            <i class='bx bx-chevron-right text-gray-400'></i>
            <a href="{{ route('articles') }}" class="text-secondary hover:text-primary transition">
                Artikel
            </a>
            <i class='bx bx-chevron-right text-gray-400'></i>
            <span class="text-primary font-medium">{{ Str::limit($article->title, 50) }}</span>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Article Header -->
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($article->image_path)
                <img src="{{ asset('storage/' . $article->image_path) }}" class="w-full h-96 object-cover" alt="{{ $article->title }}">
            @endif
            
            <div class="p-8">
                <div class="flex items-center gap-3 text-sm text-gray-600 mb-4">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $article->category->name }}</span>
                    <span>•</span>
                    <span>{{ $article->created_at->format('d F Y') }}</span>
                    <span>•</span>
                    <span>Oleh {{ $article->user->name }}</span>
                </div>
                
                <h1 class="text-4xl font-bold mb-6">{{ $article->title }}</h1>
                
                <div class="prose prose-lg max-w-none">
                    {!! $article->content !!}
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
