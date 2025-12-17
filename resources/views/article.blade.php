@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">← Kembali ke Home</a>
        
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
