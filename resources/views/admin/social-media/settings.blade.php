@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Pengaturan Media Sosial</h2>
                <a href="{{ route('admin.social-media.index') }}" class="text-gray-600 hover:text-gray-900 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <form action="{{ route('admin.social-media.settings.update') }}" method="POST" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- YouTube Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-2 border-b pb-4">
                                <i class="fab fa-youtube text-red-600 text-3xl"></i>
                                <h3 class="text-lg font-bold">YouTube API</h3>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">YouTube API Key</label>
                                <input type="password" name="youtube_api_key" value="{{ $settings['youtube_api_key'] }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Masukkan Google API Key">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">YouTube Channel ID</label>
                                <input type="text" name="youtube_channel_id"
                                    value="{{ $settings['youtube_channel_id'] }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Contoh: UC...xxxxxxxx">
                            </div>
                        </div>

                        <!-- Instagram Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3 mb-2 border-b pb-4">
                                <i class="fab fa-instagram text-pink-600 text-3xl"></i>
                                <h3 class="text-lg font-bold">Instagram API</h3>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Instagram Access Token</label>
                                <textarea name="instagram_access_token" rows="3"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="Masukkan Long-lived Access Token">{{ $settings['instagram_access_token'] }}</textarea>
                                <p class="text-xs text-gray-500 mt-2">Gunakan **Instagram Basic Display API** untuk
                                    mendapatkan token ini.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Instagram User ID
                                    (Opsional)</label>
                                <input type="text" name="instagram_user_id" value="{{ $settings['instagram_user_id'] }}"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"
                                    placeholder="ID Akun Instagram">
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-6 border-t">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg transition transform active:scale-[0.98]">
                            <i class="fas fa-save mr-2"></i>Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
