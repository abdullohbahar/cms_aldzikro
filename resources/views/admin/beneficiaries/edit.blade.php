@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-3xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">{{ isset($beneficiary) ? 'Edit' : 'Tambah' }} Penerima Santunan
                </h2>
                <a href="{{ route('admin.beneficiaries.index') }}" class="text-gray-600 hover:text-gray-900 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm">
                    <p class="font-bold mb-1">Perhatian!</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <form
                    action="{{ isset($beneficiary) ? route('admin.beneficiaries.update', $beneficiary) : route('admin.beneficiaries.store') }}"
                    method="POST" class="p-8">
                    @csrf
                    @if (isset($beneficiary))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama
                                Lengkap</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $beneficiary->name ?? '') }}"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <textarea name="address" id="address" rows="3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                                placeholder="Masukkan alamat lengkap" required>{{ old('address', $beneficiary->address ?? '') }}</textarea>
                        </div>

                        <div class="col-span-1">
                            <label for="age" class="block text-sm font-semibold text-gray-700 mb-2">Umur</label>
                            <div class="relative">
                                <input type="number" name="age" id="age"
                                    value="{{ old('age', $beneficiary->age ?? '') }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                                    placeholder="Contoh: 12" required>
                                <span class="absolute right-4 top-3 text-gray-400">Tahun</span>
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">Jenis
                                Kelamin</label>
                            <select name="gender" id="gender"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                                required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L"
                                    {{ old('gender', $beneficiary->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki (L)
                                </option>
                                <option value="P"
                                    {{ old('gender', $beneficiary->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan (P)
                                </option>
                            </select>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Kategori
                                Santunan</label>
                            <select name="type" id="type"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                                required>
                                <option value="">Pilih Kategori</option>
                                <option value="santri_dalam"
                                    {{ old('type', $beneficiary->type ?? '') == 'santri_dalam' ? 'selected' : '' }}>Santri
                                    Dalam Panti</option>
                                <option value="santri_luar"
                                    {{ old('type', $beneficiary->type ?? '') == 'santri_luar' ? 'selected' : '' }}>Santri
                                    Luar Panti</option>
                                <option value="lansia"
                                    {{ old('type', $beneficiary->type ?? '') == 'lansia' ? 'selected' : '' }}>Warga Lansia
                                    / Jompo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform active:scale-95">
                            <i class="fas fa-save mr-2"></i>{{ isset($beneficiary) ? 'Simpan Perubahan' : 'Simpan Data' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
