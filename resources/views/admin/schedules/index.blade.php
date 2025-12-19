@extends('layouts.admin')

@section('title', 'Jadwal Harian')
@section('header', 'Jadwal Harian Santri')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Kelola jadwal kegiatan harian santri</p>
    </div>
    <a href="{{ route('admin.schedules.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Jadwal
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($schedules->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kegiatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($schedules as $index => $schedule)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ ($schedules->currentPage() - 1) * $schedules->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                            {{ $schedule->day == 'Minggu' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $schedule->day }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-mono text-gray-900">
                            <i class="fas fa-clock text-green-500 mr-2"></i>{{ substr($schedule->time, 0, 5) }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $schedule->activity }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.schedules.edit', $schedule) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="inline">
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
        @if($schedules->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $schedules->links() }}
        </div>
        @endif
    @else
        <div class="p-12 text-center text-gray-500">
            <i class="fas fa-calendar-alt text-6xl mb-4 text-gray-300"></i>
            <p class="text-lg">Belum ada jadwal</p>
            <p class="text-sm mt-2">Klik tombol "Tambah Jadwal" untuk menambah jadwal kegiatan</p>
        </div>
    @endif
</div>
@endsection
