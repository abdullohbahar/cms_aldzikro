@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Detail Pendaftaran Santri</h2>
                <a href="{{ route('admin.registrations.index') }}"
                    class="text-gray-600 hover:text-gray-900 transition font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Information Card -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h3 class="font-bold text-gray-700">Data Calon Santri</h3>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Nama Lengkap</p>
                                <p class="font-semibold text-gray-900">{{ $registration->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Jenis Kelamin</p>
                                <p class="font-semibold text-gray-900">
                                    {{ $registration->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Usia</p>
                                <p class="font-semibold text-gray-900">{{ $registration->age }} Tahun</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-500 mb-1">Alamat</p>
                                <p class="font-semibold text-gray-900 leading-relaxed">{{ $registration->address }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h3 class="font-bold text-gray-700">Data Wali / Orang Tua</h3>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Nama Wali</p>
                                <p class="font-semibold text-gray-900">{{ $registration->guardian_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Nomor HP / WhatsApp</p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $registration->guardian_phone) }}"
                                    target="_blank" class="font-semibold text-blue-600 hover:underline flex items-center">
                                    <i class="fab fa-whatsapp mr-1"></i> {{ $registration->guardian_phone }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Card -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h3 class="font-bold text-gray-700">Status & Kelola</h3>
                        </div>
                        <div class="p-6">
                            <div class="mb-6">
                                <p class="text-sm text-gray-500 mb-2">Status Saat Ini</p>
                                <span
                                    class="px-4 py-2 inline-flex text-sm font-bold rounded-xl 
                                {{ $registration->status == 'pending'
                                    ? 'bg-yellow-100 text-yellow-800'
                                    : ($registration->status == 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800') }}">
                                    {{ strtoupper($registration->status) }}
                                </span>
                            </div>

                            <form action="{{ route('admin.registrations.update', $registration) }}" method="POST"
                                class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Ubah
                                        Status</label>
                                    <select name="status" id="status"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                        <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="approved"
                                            {{ $registration->status == 'approved' ? 'selected' : '' }}>Setujui (Approved)
                                        </option>
                                        <option value="rejected"
                                            {{ $registration->status == 'rejected' ? 'selected' : '' }}>Tolak (Rejected)
                                        </option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-md hover:shadow-lg transform active:scale-95">
                                    Update Status
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="bg-red-50 rounded-2xl p-6 border border-red-100">
                        <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full border-2 border-red-200 text-red-600 hover:bg-red-600 hover:text-white font-bold py-3 rounded-xl transition">
                                Hapus Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
