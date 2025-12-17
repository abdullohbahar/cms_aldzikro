@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard Overview')

@section('content')
<!-- Search articles -->
<div class="mb-8">
    <div class="relative max-w-md w-full">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <form action="{{ route('admin.articles.index') }}" method="GET">
            <input type="text" name="search" 
                class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-lg leading-5 bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-white sm:text-sm shadow-sm" 
                placeholder="Cari artikel cepat..." autocomplete="off">
        </form>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Articles Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Artikel</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalArticles }}</p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                <i class="fas fa-newspaper fa-lg"></i>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm text-gray-600">
            <i class="fas fa-check-circle text-green-500 mr-1"></i>
            <span class="font-semibold text-gray-900 mr-1">{{ $publishedArticles }}</span> Published
        </div>
    </div>

    <!-- Categories Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Kategori</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalCategories }}</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full text-green-600">
                <i class="fas fa-folder fa-lg"></i>
            </div>
        </div>
        <div class="mt-4 text-sm text-gray-500">
            Topik konten
        </div>
    </div>

    <!-- Galleries Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Album Galeri</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalGalleries }}</p>
            </div>
            <div class="p-3 bg-purple-100 rounded-full text-purple-600">
                <i class="fas fa-images fa-lg"></i>
            </div>
        </div>
        <div class="mt-4 text-sm text-gray-500">
            Dokumentasi kegiatan
        </div>
    </div>

    <!-- Users Card -->
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Users</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
            </div>
            <div class="p-3 bg-yellow-100 rounded-full text-yellow-600">
                <i class="fas fa-users fa-lg"></i>
            </div>
        </div>
        <div class="mt-4 text-sm text-gray-500">
            Registered users
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-chart-pie text-blue-500 mr-2"></i> Artikel per Kategori
        </h3>
        <canvas id="categoryChart" height="200"></canvas>
    </div>

    <!-- Recent Articles -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-clock text-blue-500 mr-2"></i> Artikel Terbaru
        </h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-2">Judul</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-2">Status</th>
                        <th class="text-right text-xs font-medium text-gray-500 uppercase tracking-wider py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentArticles as $article)
                    <tr>
                        <td class="py-3 text-sm">
                            <div class="flex items-center">
                                @if($article->image_path)
                                <img class="h-8 w-8 rounded object-cover mr-3" src="{{ asset('storage/' . $article->image_path) }}" alt="">
                                @else
                                <div class="h-8 w-8 rounded bg-gray-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                                @endif
                                <span class="font-medium text-gray-900 truncate max-w-xs">{{ $article->title }}</span>
                            </div>
                        </td>
                        <td class="py-3 text-sm">
                            @if($article->is_published)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                            @endif
                        </td>
                        <td class="py-3 text-sm text-right">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-sm text-gray-500">Belum ada artikel</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-right">
            <a href="{{ route('admin.articles.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                Lihat semua artikel <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('categoryChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: [
                        '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
                        '#6366F1', '#EC4899', '#14B8A6'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                },
                cutout: '70%',
            }
        });
    });
</script>
@endsection
