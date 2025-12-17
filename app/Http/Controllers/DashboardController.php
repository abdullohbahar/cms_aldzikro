<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalArticles = Article::count();
        $publishedArticles = Article::where('is_published', true)->count();
        $totalCategories = Category::count();
        $totalGalleries = Gallery::whereNull('parent_id')->count(); // count albums
        $totalUsers = User::count();

        // Recent Articles
        $recentArticles = Article::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        // Articles per Category for Chart
        $categories = Category::withCount('articles')->get();
        $chartLabels = $categories->pluck('name');
        $chartData = $categories->pluck('articles_count');

        return view('admin.dashboard', compact(
            'totalArticles',
            'publishedArticles',
            'totalCategories',
            'totalGalleries',
            'totalUsers',
            'recentArticles',
            'chartLabels',
            'chartData'
        ));
    }
}
