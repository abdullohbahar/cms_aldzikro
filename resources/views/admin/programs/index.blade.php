@extends('layouts.admin')

@section('title', 'Program Unggulan')
@section('header', 'Program Unggulan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola program unggulan organisasi</p>
    </div>
    <a href="{{ route('admin.programs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Program
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($programs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($programs as $program)
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="aspect-video bg-gray-100">
                    <img src="{{ asset('storage/' . $program->image_path) }}" 
                         alt="{{ $program->name }}" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">{{ $program->name }}</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        <i class="fas fa-list-ul text-blue-500 mr-1"></i> 
                        {{ $program->sub_programs_count }} Sub-Program
                    </p>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.programs.edit', $program) }}" 
                           class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-center text-sm">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="flex-1">
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
        @if($programs->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $programs->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-star text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada program unggulan</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Program" untuk menambah program</p>
        </div>
    @endif
</div>
@endsection
