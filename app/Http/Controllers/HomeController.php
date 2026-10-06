<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        Visit::record('home');

        return view('home', [
            'featuredPosts' => Post::where('is_published', true)
                ->whereNotNull('featured')
                ->latest()
                ->take(3)
                ->get(),
            'latestPosts' => Post::where('is_published', true)
                ->latest()
                ->take(4)
                ->get(),
            'categories' => Category::withCount('posts')->get(),
        ]);
    }
}
