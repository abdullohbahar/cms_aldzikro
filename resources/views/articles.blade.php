@extends('layouts.app')

@section('title', 'Artikel & Berita')

@section('content')
{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Artikel & Berita</h1>
        </div>
    </div>
</section>

{{-- Search & Filter Section --}}
<section class="section bg-[#F3F3F3]">
    <div class="container">
        <div class="grid grid-cols-12 gap-8">
            {{-- Main Content --}}
            <div class="col-span-12 lg:col-span-8">

                {{-- Search Bar --}}
                <form action="{{ route('articles') }}" method="GET" class="mb-8">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari artikel..."
                            class="w-full px-5 py-4 pl-12 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <i class='bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl'></i>
                        @if(request('search'))
                            <a href="{{ route('articles') }}" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class='bx bx-x text-xl'></i>
                            </a>
                        @endif
                    </div>
                </form>

                {{-- Articles Grid --}}
                @if($articles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        @foreach($articles as $article)
                        <div class="article-card bg-white hover:shadow-2xl">
                            {{-- Article Image --}}
                            <a href="{{ route('article.show', $article->slug) }}" class="block">
                                @if($article->image_path)
                                    <img src="{{ asset('storage/' . $article->image_path) }}"
                                         alt="{{ $article->title }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                        <i class='bx bx-news text-white text-5xl'></i>
                                    </div>
                                @endif
                            </a>

                            <div class="p-6">
                                {{-- Category Badge --}}
                                @if($article->category)
                                    <a href="{{ route('articles', ['category' => $article->category->slug]) }}"
                                       class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full mb-3 hover:bg-primary hover:text-white transition">
                                        {{ $article->category->name }}
                                    </a>
                                @endif

                                {{-- Article Title --}}
                                <h3 class="text-lg font-bold text-primary font-primary mb-3 line-clamp-2">
                                    <a href="{{ route('article.show', $article->slug) }}" class="hover:text-accent transition">
                                        {{ $article->title }}
                                    </a>
                                </h3>

                                {{-- Article Meta --}}
                                <div class="flex items-center gap-4 text-xs text-secondary mb-4">
                                    <span class="flex items-center gap-1">
                                        <i class='bx bx-calendar'></i>
                                        {{ $article->created_at->format('d F Y') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class='bx bx-user'></i>
                                        {{ $article->user->name }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class='bx bx-show'></i>
                                        {{ number_format($article->view_count) }} views
                                    </span>
                                </div>

                                {{-- Article Excerpt --}}
                                <p class="text-sm text-secondary line-clamp-3 mb-4">
                                    {!! strip_tags(Str::limit($article->content, 120)) !!}
                                </p>

                                {{-- Read More Link --}}
                                <a href="{{ route('article.show', $article->slug) }}"
                                   class="inline-flex items-center gap-2 text-primary font-semibold text-sm hover:text-accent transition">
                                    Baca Selengkapnya
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    @if($articles->hasPages())
                        <div class="flex justify-center">
                            {{ $articles->links() }}
                        </div>
                    @endif
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-16">
                        <i class='bx bx-file-search text-6xl text-gray-300 mb-4'></i>
                        <h3 class="text-xl font-bold text-gray-600 mb-2">Tidak ada artikel ditemukan</h3>
                        <p class="text-gray-500 mb-6">
                            @if(request('search'))
                                Coba kata kunci lain atau
                            @else
                                Belum ada artikel yang dipublikasikan.
                            @endif
                        </p>
                        @if(request('search') || request('category'))
                            <a href="{{ route('articles') }}" class="btn btn-primary">
                                Lihat Semua Artikel
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-span-12 lg:col-span-4 space-y-8">

                {{-- Categories Widget --}}
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-primary font-primary mb-4 pb-2 border-b border-gray-200">
                        <i class='bx bx-folder mr-2'></i>Kategori
                    </h3>
                    @if($categories->count() > 0)
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('articles') }}"
                                   class="flex items-center justify-between py-2 px-3 rounded-lg {{ !request('category') ? 'bg-primary text-white' : 'hover:bg-gray-100 transition' }}">
                                    <span>Semua</span>
                                    <span class="text-xs px-2 py-1 rounded-full {{ !request('category') ? 'bg-white/20' : 'bg-gray-200' }}">
                                        {{ \App\Models\Article::where('is_published', true)->count() }}
                                    </span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('articles', ['category' => $category->slug]) }}"
                                   class="flex items-center justify-between py-2 px-3 rounded-lg {{ request('category') == $category->slug ? 'bg-primary text-white' : 'hover:bg-gray-100 transition' }}">
                                    <span>{{ $category->name }}</span>
                                    <span class="text-xs px-2 py-1 rounded-full {{ request('category') == $category->slug ? 'bg-white/20' : 'bg-gray-200' }}">
                                        {{ $category->articles_count }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada kategori</p>
                    @endif
                </div>

                {{-- Popular Articles Widget --}}
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-primary font-primary mb-4 pb-2 border-b border-gray-200">
                        <i class='bx bx-trending-up mr-2'></i>Artikel Populer
                    </h3>
                    @if($popularArticles->count() > 0)
                        <ul class="space-y-4">
                            @foreach($popularArticles as $index => $popular)
                            <li class="flex gap-3">
                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-primary/10 text-primary font-bold flex items-center justify-center text-sm">
                                    {{ $index + 1 }}
                                </span>
                                <div class="flex-1">
                                    <a href="{{ route('article.show', $popular->slug) }}" class="block">
                                        <h4 class="text-sm font-semibold text-primary hover:text-accent transition line-clamp-2">
                                            {{ $popular->title }}
                                        </h4>
                                        <span class="text-xs text-secondary">
                                            <i class='bx bx-show'></i> {{ number_format($popular->view_count) }} views
                                        </span>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada artikel populer</p>
                    @endif
                </div>

                {{-- Back to Home CTA --}}
                <div class="bg-primary rounded-xl p-6 text-center">
                    <i class='bx bx-home text-4xl text-accent mb-3'></i>
                    <h3 class="text-lg font-bold text-white mb-2">Kembali ke Beranda</h3>
                    <p class="text-white/80 text-sm mb-4">Jelajahi lebih banyak konten menarik</p>
                    <a href="{{ route('home') }}" class="inline-block bg-accent text-white px-6 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                        <i class='bx bx-home-alt-2 mr-1'></i> Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
