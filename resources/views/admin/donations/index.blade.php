@extends('layouts.admin')

@section('title', 'Konfirmasi Donasi')
@section('header', 'Konfirmasi Donasi')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <p class="text-gray-600">Daftar konfirmasi transfer donasi yang masuk</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @if ($donations->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor HP
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($donations as $index => $donation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ ($donations->currentPage() - 1) * $donations->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $donation->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $donation->phone }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">
                                    Rp {{ number_format(str_replace(['.', ','], '', $donation->amount), 0, ',', '.') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if ($donation->status == 'verified')
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                @elseif($donation->status == 'cancelled')
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                @else
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $donation->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.donations.show', $donation) }}"
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST"
                                        class="inline">
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
            @if ($donations->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $donations->links() }}
                </div>
            @endif
        @else
            <div class="p-12 text-center text-gray-500">
                <i class="fas fa-hand-holding-heart text-6xl mb-4 text-gray-300"></i>
                <p class="text-lg">Belum ada konfirmasi donasi</p>
                <p class="text-sm mt-2">Belum ada data konfirmasi transfer yang masuk</p>
            </div>
        @endif
    </div>
@endsection
