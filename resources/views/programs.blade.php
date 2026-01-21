@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Program Unggulan</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title">Program Unggulan Al-Dzikro</h2>
            <p class="section-description">Program-program yang menjadi unggulan Yayasan Al-Dzikro</p>
        </div>
        
        @if($programs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($programs as $program)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $program->image_path) }}" alt="{{ $program->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-4">{{ $program->name }}</h3>
                    
                    @if($program->subPrograms->count() > 0)
                    <div class="space-y-2">
                        <p class="text-sm text-secondary font-semibold mb-2">Sub Program:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($program->subPrograms as $subProgram)
                            <li class="text-secondary text-sm">{{ $subProgram->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-500">Belum ada program unggulan</p>
        </div>
        @endif
    </div>
</section>
@endsection
