@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Kelola Postingan Media Sosial</h2>
                <p class="text-sm text-gray-500">Postingan yang ditarik otomatis dari YouTube & Instagram.</p>
            </div>

            <div class="flex space-x-3">
                <a href="{{ route('admin.social-media.settings') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition flex items-center">
                    <i class="fas fa-cog mr-2"></i>Pengaturan
                </a>
                <form action="{{ route('admin.social-media.sync') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition flex items-center">
                        <i class="fas fa-sync-alt mr-2 shadow-sm"></i>Tarik Data Baru
                    </button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($posts as $post)
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col group hover:shadow-md transition">
                    <div class="relative aspect-video overflow-hidden bg-gray-100">
                        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        <div class="absolute top-2 left-2">
                            <span
                                class="px-2 py-1 rounded text-[10px] font-bold uppercase shadow-sm
                        {{ $post->platform == 'youtube' ? 'bg-red-600 text-white' : 'bg-pink-600 text-white' }}">
                                <i class="fab fa-{{ $post->platform }} mr-1"></i>{{ $post->platform }}
                            </span>
                        </div>
                    </div>

                    <div class="p-4 flex-grow">
                        <h3 class="text-sm font-bold text-gray-900 line-clamp-2 mb-2 min-h-[40px]">
                            {{ $post->title ?: 'Postingan Instagram' }}</h3>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider mb-4">
                            {{ $post->posted_at->format('d M Y - H:i') }}</p>

                        <div class="flex justify-between items-center mt-auto border-t pt-4">
                            <div class="flex space-x-2">
                                <form action="{{ route('admin.social-media.toggle', $post) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="p-2 rounded-lg transition {{ $post->is_active ? 'bg-green-100 text-green-600 hover:bg-green-200' : 'bg-gray-100 text-gray-400 hover:bg-gray-200' }}"
                                        title="{{ $post->is_active ? 'Sembunyikan' : 'Tampilkan' }}">
                                        <i class="fas fa-{{ $post->is_active ? 'eye' : 'eye-slash' }}"></i>
                                    </button>
                                </form>
                                <a href="{{ $post->url }}" target="_blank"
                                    class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition"
                                    title="Buka Link">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>

                            <form action="{{ route('admin.social-media.destroy', $post) }}" method="POST"
                                onsubmit="return confirm('Hapus postingan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="mb-4">
                        <i class="fas fa-share-alt text-gray-300 text-5xl"></i>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada data media sosial. Klik **Tarik Data Baru** di atas.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
