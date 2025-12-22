<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Setting;
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
     * Display article detail
     */
    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)
            ->with('category')
            ->firstOrFail();
        
        // Increment view count
        $article->increment('view_count');

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

    /**
     * Display About Us page
     */
    public function about()
    {
        $title = Setting::get('about_title', 'Tentang Kami');
        $content = Setting::get('about_content', '');
        $vision = Setting::get('about_vision', '');
        $purpose = Setting::get('about_purpose', '');
        $mission = Setting::get('about_mission', '');
        $image = Setting::get('about_image', null);

        return view('about', compact('title', 'content', 'vision', 'purpose', 'mission', 'image'));
    }
}
