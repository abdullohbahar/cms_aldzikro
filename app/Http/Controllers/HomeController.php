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
        // Get testimonials
        $testimonials = \App\Models\Testimonial::latest()->take(5)->get();

        // Get facilities
        $facilities = \App\Models\Facility::latest()->take(4)->get();

        // Get latest articles
        $articles = Article::with('category')
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        // Get Visi Misi from settings
        $vision = Setting::get('about_vision', '');
        $mission = Setting::get('about_mission', '');
        $purpose = Setting::get('about_purpose', '');
        $aboutUs = Setting::get('about_content', '');
        $aboutImage = Setting::get('about_image', '');


        return view('home.index', get_defined_vars());
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
     * Display all articles with pagination and filters
     */
    public function articles(Request $request)
    {
        $query = Article::with(['category', 'user'])
            ->where('is_published', true)
            ->orderBy('created_at', 'desc');

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search articles
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%");
            });
        }

        $articles = $query->paginate(12)->withQueryString();

        // Get all categories for filter
        $categories = \App\Models\Category::withCount('articles')
            ->has('articles')
            ->orderBy('name')
            ->get();

        // Get popular articles (by view count)
        $popularArticles = Article::with('category')
            ->where('is_published', true)
            ->orderBy('view_count', 'desc')
            ->take(5)
            ->get();

        return view('articles', compact('articles', 'categories', 'popularArticles'));
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
    // public function about()
    // {
    //     $title = Setting::get('about_title', 'Tentang Kami');
    //     $content = Setting::get('about_content', '');
    //     $vision = Setting::get('about_vision', '');
    //     $purpose = Setting::get('about_purpose', '');
    //     $mission = Setting::get('about_mission', '');
    //     $image = Setting::get('about_image', null);

    //     return view('about', compact('title', 'content', 'vision', 'purpose', 'mission', 'image'));
    // }

    public function about()
    {
        // Get facilities
        $facilities = \App\Models\Facility::latest()->get();

        // Get board members
        $boardMembers = \App\Models\BoardMember::active()->ordered()->get();

        // Get Visi Misi from settings
        $vision = Setting::get('about_vision', '');
        $mission = Setting::get('about_mission', '');
        $purpose = Setting::get('about_purpose', '');
        $aboutUs = Setting::get('about_content', '');
        $aboutImage = Setting::get('about_image', '');

        return view('home.about', get_defined_vars());
    }

    /**
     * Display Programs page
     */
    public function programs()
    {
        $programs = \App\Models\Program::with('subPrograms')->latest()->get();
        return view('programs', compact('programs'));
    }

    /**
     * Display Schedule page
     */
    public function schedule()
    {
        $schedules = \App\Models\Schedule::orderByRaw(
            "FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')"
        )->orderBy('time')->get();
        return view('schedule', compact('schedules'));
    }

    /**
     * Display Contact page
     */
    public function contact()
    {
        // Get staff contacts
        $contacts = \App\Models\Contact::latest()->get();

        // Get organization contact from settings
        $orgAddress = Setting::get('organization_address', '');
        $orgEmail = Setting::get('organization_email', '');
        $orgPhone = Setting::get('organization_phone', '');

        // Get bank accounts for donations
        $bankAccounts = \App\Models\BankAccount::latest()->get();

        // Get QRIS image
        $qrisImage = Setting::get('qris_image', null);

        return view('contact', compact('contacts', 'orgAddress', 'orgEmail', 'orgPhone', 'bankAccounts', 'qrisImage'));
    }

    /**
     * Submit feedback from contact form
     */
    public function submitFeedback(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'message' => 'required|string',
        ]);

        \App\Models\Feedback::create($validated);

        return redirect()->route('contact')->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }
}
