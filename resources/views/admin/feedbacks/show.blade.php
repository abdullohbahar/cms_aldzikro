@extends('layouts.admin')

@section('title', 'Detail Kritik & Saran')
@section('header', 'Detail Kritik & Saran')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                Informasi Pengirim
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                    <p class="text-base text-gray-900 font-medium">
                        <i class="fas fa-user text-blue-500 mr-2"></i>{{ $feedback->name }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Nomor HP</label>
                    <p class="text-base text-gray-900 font-medium">
                        <i class="fas fa-phone text-green-500 mr-2"></i>{{ $feedback->phone }}
                    </p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal</label>
                    <p class="text-base text-gray-900">
                        <i class="fas fa-calendar text-gray-500 mr-2"></i>{{ $feedback->created_at->format('d F Y, H:i') }} WIB
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-comment-alt text-blue-600 mr-2"></i>
                Pesan
            </h3>
            <div class="p-4 bg-blue-50 rounded-lg border-l-4 border-blue-600">
                <p class="text-gray-800 whitespace-pre-line leading-relaxed">{{ $feedback->message }}</p>
            </div>
        </div>

        <div class="flex gap-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.feedbacks.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <form action="{{ route('admin.feedbacks.destroy', $feedback) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete(event)"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg">
                    <i class="fas fa-trash mr-2"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
