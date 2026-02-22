<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocialPost;

class SocialMediaController extends Controller
{
    public function index()
    {
        $posts = SocialPost::where('is_active', true)->latest('posted_at')->paginate(12);
        return view('social_media', compact('posts'));
    }
}
