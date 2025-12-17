<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with latest articles
     */
    public function index(Request $request)
    {
        return view('home.index');
    }

    /**
     * Display a single article
     */
    public function showArticle($slug)
    {
        $article = Article::with(['user', 'category'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('article', compact('article'));
    }

    /**
     * Display gallery page
     */
    public function gallery()
    {
        $albums = Gallery::whereNull('parent_id')
            ->withCount('children')
            ->latest()
            ->get();

        return view('gallery', compact('albums'));
    }

    /**
     * Display album items
     */
    public function showAlbum($id)
    {
        $album = Gallery::with('children')
            ->whereNull('parent_id')
            ->findOrFail($id);

        return view('album', compact('album'));
    }
}
