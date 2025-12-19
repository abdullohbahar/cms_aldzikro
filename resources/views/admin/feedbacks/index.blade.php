@extends('layouts.admin')

@section('title', 'Kritik & Saran')
@section('header', 'Kritik & Saran')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Daftar kritik dan saran yang masuk</p>
    </div>
    <a href="{{ route('admin.feedbacks.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Kritik & Saran
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($feedbacks->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($feedbacks as $index => $feedback)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $feedback->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-phone text-green-500 mr-2"></i>{{ $feedback->phone }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 max-w-xs truncate">
                            {{ Str::limit($feedback->message, 50) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $feedback->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.feedbacks.show', $feedback) }}" 
                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                            <form action="{{ route('admin.feedbacks.destroy', $feedback) }}" method="POST" class="inline">
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
        @if($feedbacks->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $feedbacks->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-comments text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada kritik & saran</p>
            <p class="text-sm mt-2">Belum ada kritik & saran yang masuk</p>
        </div>
    @endif
</div>
@endsection
