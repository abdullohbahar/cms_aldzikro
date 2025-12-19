@extends('layouts.admin')

@section('title', 'Kontak Pengurus')
@section('header', 'Kelola Kontak Pengurus')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola daftar kontak pengurus organisasi</p>
    </div>
    <a href="{{ route('admin.contacts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Kontak
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($contacts->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pengurus</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($contacts as $index => $contact)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-phone text-green-500 mr-2"></i>{{ $contact->phone }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>{{ $contact->email }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.contacts.edit', $contact) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
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
        @if($contacts->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-address-book text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada kontak pengurus</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Kontak" untuk menambah kontak baru</p>
        </div>
    @endif
</div>
@endsection
