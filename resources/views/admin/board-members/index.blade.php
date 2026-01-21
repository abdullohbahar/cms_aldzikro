@extends('layouts.admin')

@section('title', 'Struktur Pengurus')
@section('header', 'Struktur Pengurus')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola struktur pengurus yayasan</p>
    </div>
    <a href="{{ route('admin.board-members.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Pengurus
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($boardMembers->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urutan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($boardMembers as $member)
                    <tr class="{{ !$member->is_active ? 'bg-gray-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-gray-700">{{ $member->order }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-700">{{ $member->position }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($member->is_active)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.board-members.edit', $member) }}"
                                   class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.board-members.destroy', $member) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(event)"
                                            class="text-red-600 hover:text-red-900 ml-3">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($boardMembers->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $boardMembers->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-users text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada data pengurus</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Pengurus" untuk menambah pengurus</p>
        </div>
    @endif
</div>
@endsection
