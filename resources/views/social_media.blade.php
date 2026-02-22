@extends('layouts.app')

@section('title', 'Media Sosial')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    Media Sosial</h1>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-secondary uppercase mb-4 tracking-tight">Postingan Terbaru
                </h2>
                <div class="w-20 h-1.5 bg-accent mx-auto rounded-full mb-6"></div>
                <p class="text-gray-500 font-medium text-lg leading-relaxed">
                    Tetap terhubung dengan kegiatan kami melalui kanal YouTube dan Instagram resmi Yayasan Al-Dzikro.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                @forelse($posts as $post)
                    <div
                        class="group h-full flex flex-col bg-white rounded-[2rem] shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-50 transform hover:-translate-y-2">
                        <!-- Media Preview -->
                        <div class="relative aspect-video overflow-hidden bg-gray-100">
                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                            <!-- Platform Badge -->
                            <div class="absolute top-4 left-4">
                                <div
                                    class="flex items-center space-x-2 px-3 py-1.5 rounded-full text-[11px] font-black uppercase tracking-wider shadow-lg backdrop-blur-md
                                {{ $post->platform == 'youtube' ? 'bg-red-600/90 text-white' : 'bg-pink-600/90 text-white' }}">
                                    <i class="fab fa-{{ $post->platform }}"></i>
                                    <span>{{ $post->platform }}</span>
                                </div>
                            </div>

                            <!-- Play/Icon Overlay -->
                            <div
                                class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                                <div
                                    class="w-16 h-16 rounded-full bg-white/30 backdrop-blur-md flex items-center justify-center transform scale-75 group-hover:scale-100 transition-transform duration-500">
                                    @if ($post->platform == 'youtube')
                                        <i class="fas fa-play text-white text-2xl ml-1"></i>
                                    @else
                                        <i class="fas fa-image text-white text-2xl"></i>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 flex flex-col flex-grow">
                            <div
                                class="flex items-center text-[11px] text-accent font-black uppercase tracking-widest mb-4">
                                <i class="far fa-calendar-alt mr-2"></i>
                                {{ $post->posted_at->translatedFormat('d F Y') }}
                            </div>

                            <h3
                                class="text-xl font-bold text-secondary line-clamp-2 mb-6 leading-tight group-hover:text-primary transition-colors flex-grow">
                                {{ $post->title ?: 'Postingan Instagram' }}
                            </h3>

                            <a href="{{ $post->url }}" target="_blank"
                                class="inline-flex items-center justify-center bg-gray-50 text-secondary border-2 border-transparent group-hover:bg-primary group-hover:text-white px-6 py-3 rounded-xl font-black uppercase text-xs tracking-widest transition-all duration-300 w-full md:w-auto">
                                Lihat Postingan
                                <i class="fas fa-external-link-alt ml-2 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-gray-400 font-medium">Belum ada postingan media sosial saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-20 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
