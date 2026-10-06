<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        Visit::record('home');

        if (! Schema::hasTable('posts')) {
            return view('home', [
                'featuredPosts' => collect(),
                'latestPosts' => collect(),
                'categories' => collect(),
            ]);
        }

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
            'categories' => Schema::hasTable('categories')
                ? Category::withCount('posts')->get()
                : collect(),
        ]);
    }
}
