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
        
        // Visitor Statistics
        $totalVisitors = \App\Models\Visitor::count(); // Total unique visitors (1 per IP per day)
        $todayVisitors = \App\Models\Visitor::whereDate('visited_at', today())->count(); // Today's unique visitors
        $topArticles = Article::orderBy('view_count', 'desc')->take(5)->get();

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
            'totalVisitors',
            'todayVisitors',
            'topArticles',
            'recentArticles',
            'chartLabels',
            'chartData'
        ));
    }
}
