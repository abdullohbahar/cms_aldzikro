@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-16">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $title }}</h1>
        <div class="w-24 h-1 bg-white mx-auto rounded"></div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <!-- Image Section -->
    @if($image)
    <div class="mb-12 flex justify-center">
        <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" 
            class="rounded-lg shadow-xl max-w-4xl w-full object-cover" style="max-height: 500px;">
    </div>
    @endif

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="prose prose-lg max-w-none">
                {!! $content !!}
            </div>
        </div>

        <!-- Vision & Mission Section -->
        @if($vision || $purpose || $mission)
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Vision -->
            @if($vision)
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg shadow-lg p-8 border-t-4 border-blue-600">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-600 text-white p-3 rounded-full mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Visi</h2>
                </div>
                <div class="text-gray-700 leading-relaxed prose prose-sm max-w-none">{!! $vision !!}</div>
            </div>
            @endif

            <!-- Purpose -->
            @if($purpose)
            <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg shadow-lg p-8 border-t-4 border-purple-600">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-600 text-white p-3 rounded-full mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Tujuan</h2>
                </div>
                <div class="text-gray-700 leading-relaxed prose prose-sm max-w-none">{!! $purpose !!}</div>
            </div>
            @endif

            <!-- Mission -->
            @if($mission)
            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-lg shadow-lg p-8 border-t-4 border-cyan-600">
                <div class="flex items-center mb-4">
                    <div class="bg-cyan-600 text-white p-3 rounded-full mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Misi</h2>
                </div>
                <div class="text-gray-700 leading-relaxed prose prose-sm max-w-none">{!! $mission !!}</div>
            </div>
            @endif
        </div>
        @endif

        <!-- Back to Home Link -->
        <div class="text-center mt-12">
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
