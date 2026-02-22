@extends('layouts.app')

@section('title', 'Pendaftaran Santri')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="pt-35 pb-35 md:pt-60 md:pb-20">
                <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">
                    Pendaftaran Santri</h1>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-10">
                    <p class="text-secondary font-bold text-lg">Isi formulir dibawah ini untuk mendaftarkan calon santri
                        Yayasan Al-Dzikro</p>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-10 rounded-2xl shadow-sm animate__animated animate__fadeIn"
                        role="alert">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="bg-white rounded-[2rem] shadow-2xl p-8 md:p-15 border border-gray-100">
                    <form action="{{ route('registration.store') }}" method="POST" class="space-y-8">
                        @csrf

                        <div>
                            <label for="name"
                                class="block text-secondary font-black uppercase text-sm mb-3 tracking-widest">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 text-lg font-secondary transition-all"
                                required value="{{ old('name') }}">
                        </div>

                        <div>
                            <label for="age"
                                class="block text-secondary font-black uppercase text-sm mb-3 tracking-widest">Usia</label>
                            <input type="number" name="age" id="age"
                                class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 text-lg font-secondary transition-all"
                                required value="{{ old('age') }}">
                        </div>

                        <div>
                            <label class="block text-secondary font-black uppercase text-sm mb-4 tracking-widest">Jenis
                                Kelamin</label>
                            <div class="flex flex-col space-y-4">
                                <label class="inline-flex items-center cursor-pointer group">
                                    <div class="relative">
                                        <input type="radio" name="gender" value="L" class="sr-only" required
                                            {{ old('gender') == 'L' ? 'checked' : '' }}>
                                        <div
                                            class="w-6 h-6 border-2 border-gray-300 rounded-full bg-white transition-all group-hover:border-accent flex items-center justify-center">
                                            <div class="w-3 h-3 bg-accent rounded-full opacity-0 scale-0 transition-all">
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="ml-3 text-secondary group-hover:text-primary font-bold transition-colors">Laki-Laki</span>
                                </label>

                                <label class="inline-flex items-center cursor-pointer group">
                                    <div class="relative">
                                        <input type="radio" name="gender" value="P" class="sr-only"
                                            {{ old('gender') == 'P' ? 'checked' : '' }}>
                                        <div
                                            class="w-6 h-6 border-2 border-gray-300 rounded-full bg-white transition-all group-hover:border-accent flex items-center justify-center">
                                            <div class="w-3 h-3 bg-accent rounded-full opacity-0 scale-0 transition-all">
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="ml-3 text-secondary group-hover:text-primary font-bold transition-colors">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="address"
                                class="block text-secondary font-black uppercase text-sm mb-3 tracking-widest">Alamat</label>
                            <textarea name="address" id="address" rows="3"
                                class="w-full border-2 border-gray-100 focus:border-accent outline-none p-4 rounded-2xl font-secondary transition-all resize-none"
                                required>{{ old('address') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="guardian_name"
                                    class="block text-secondary font-black uppercase text-sm mb-3 tracking-widest">Nama
                                    Wali</label>
                                <input type="text" name="guardian_name" id="guardian_name"
                                    class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 text-lg font-secondary transition-all"
                                    required value="{{ old('guardian_name') }}">
                            </div>
                            <div>
                                <label for="guardian_phone"
                                    class="block text-secondary font-black uppercase text-sm mb-3 tracking-widest">Nomor HP
                                    Wali</label>
                                <input type="text" name="guardian_phone" id="guardian_phone"
                                    class="w-full border-b-2 border-gray-200 focus:border-accent outline-none py-3 text-lg font-secondary transition-all"
                                    required placeholder="Contoh: 08123456789" value="{{ old('guardian_phone') }}">
                            </div>
                        </div>

                        <div class="pt-8">
                            <button type="submit"
                                class="bg-primary text-white px-10 py-4 rounded-xl font-black uppercase tracking-widest hover:bg-[#324b6b] transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 block md:inline-block w-full md:w-auto">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        input[type="radio"]:checked+div {
            border-color: #FDB913;
        }

        input[type="radio"]:checked+div div {
            opacity: 1;
            transform: scale(1);
        }
    </style>
@endsection
