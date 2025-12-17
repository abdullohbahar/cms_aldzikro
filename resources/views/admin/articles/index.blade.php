@extends('layouts.admin')

@section('title', 'Artikel')
@section('header', 'Manajemen Artikel')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div>
        <h3 class="text-xl font-bold text-gray-800">Daftar Artikel</h3>
        <p class="text-sm text-gray-500">Kelola semua konten artikel</p>
    </div>
    <div class="flex w-full md:w-auto gap-2">
        <!-- Search Form -->
        <form action="{{ route('admin.articles.index') }}" method="GET" class="flex gap-2 flex-1 md:w-80">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari artikel..." 
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            </div>
            @if(request('search'))
            <a href="{{ route('admin.articles.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center justify-center border border-gray-300" title="Reset">
                <i class="fas fa-times"></i>
            </a>
            @endif
        </form>
        
        <a href="{{ route('admin.articles.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-2 whitespace-nowrap">
            <i class="fas fa-plus"></i> <span class="hidden sm:inline">Tambah</span>
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Penulis</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($articles as $article)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @if($article->image_path)
                            <img src="{{ asset('storage/' . $article->image_path) }}" class="w-12 h-12 rounded-lg object-cover mr-3 border border-gray-200 bg-gray-50">
                        @else
                            <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center mr-3 text-gray-400">
                                <i class="fas fa-image fa-lg"></i>
                            </div>
                        @endif
                        <span class="font-medium text-gray-900">{{ $article->title }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <span class="px-2 py-1 rounded bg-gray-100 border border-gray-200 text-xs">
                        {{ $article->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random&size=24" class="rounded-full">
                        {{ $article->user->name }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($article->is_published)
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800 border border-green-200 flex w-fit items-center gap-1">
                            <i class="fas fa-check-circle text-[10px]"></i> Published
                        </span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 flex w-fit items-center gap-1">
                            <i class="fas fa-clock text-[10px]"></i> Draft
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 p-2 rounded hover:bg-blue-100 transition mr-1" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded hover:bg-red-100 transition" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                    <div class="flex flex-col items-center justify-center">
                        <div class="bg-gray-100 p-4 rounded-full mb-3">
                            <i class="fas fa-newspaper text-gray-300 text-4xl"></i>
                        </div>
                        <p class="font-medium text-gray-600">Tidak ada artikel ditemukan</p>
                        @if(request('search'))
                        <p class="text-sm mt-1">Coba kata kunci pencarian lain</p>
                        @else
                        <p class="text-sm mt-1">Mulai dengan membuat artikel baru</p>
                        @endif
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $articles->links() }}
</div>
@endsection
