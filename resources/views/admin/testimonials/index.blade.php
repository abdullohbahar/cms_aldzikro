@extends('layouts.admin')

@section('title', 'Testimoni')
@section('header', 'Testimoni')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola testimoni dari alumni/wali santri</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Testimoni
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($testimonials->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition p-6">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('storage/' . $testimonial->photo_path) }}" 
                         alt="{{ $testimonial->name }}" 
                         class="w-24 h-24 rounded-full object-cover border-4 border-gray-100 mb-4">
                    <h3 class="font-semibold text-lg text-gray-800">{{ $testimonial->name }}</h3>
                    @if($testimonial->position)
                    <p class="text-sm text-gray-500 mb-3">{{ $testimonial->position }}</p>
                    @endif
                    <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                        "{{ $testimonial->description }}"
                    </p>
                    <div class="flex gap-2 mt-auto w-full">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                           class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-center text-sm">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(event)"
                                    class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-sm">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($testimonials->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $testimonials->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-quote-right text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada testimoni</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Testimoni" untuk menambah testimoni</p>
        </div>
    @endif
</div>
@endsection
