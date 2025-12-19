@extends('layouts.admin')

@section('title', 'Fasilitas Kami')
@section('header', 'Kelola Fasilitas')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola daftar fasilitas yang tersedia</p>
    </div>
    <a href="{{ route('admin.facilities.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Fasilitas
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($facilities->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Fasilitas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($facilities as $index => $facility)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ ($facilities->currentPage() - 1) * $facilities->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ asset('storage/' . $facility->image_path) }}" 
                           data-fancybox="gallery" 
                           data-caption="{{ $facility->name }}">
                            <img src="{{ asset('storage/' . $facility->image_path) }}" 
                                 alt="{{ $facility->name }}" 
                                 class="h-16 w-16 object-cover rounded-lg border border-gray-200 cursor-pointer hover:opacity-75 transition">
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $facility->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.facilities.edit', $facility) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(event)"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        @if($facilities->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $facilities->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-building text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada fasilitas</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Fasilitas" untuk menambah fasilitas baru</p>
        </div>
    @endif
</div>

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    // Initialize Fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: {
            display: {
                left: ["infobar"],
                middle: [],
                right: ["close"],
            },
        },
    });
</script>
@endsection
