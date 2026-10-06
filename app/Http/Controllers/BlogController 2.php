<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        Visit::record('blog');

        $query = Post::where('is_published', true)->with('category')->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->string('category'));
            });
        }

        return view('blog.index', [
            'posts' => $query->paginate(9)->withQueryString(),
            'categories' => Category::withCount('posts')->get(),
            'activeCategory' => $request->string('category'),
        ]);
    }

    public function show(Post $post): View
    {
        Visit::record('blog');

        if (! $post->is_published) {
            abort(404);
        }

        $post->increment('visits');

        return view('blog.show', [
            'post' => $post,
            'latestPosts' => Post::where('is_published', true)
                ->whereKeyNot($post->id)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
