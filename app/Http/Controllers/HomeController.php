<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
       
        return view('home');

      
    }

    public function post($postId)
    {
        $post = Post::find($postId);
        $categories = Category::all();
        $latestPosts = Post::orderBy('id', 'DESC')->take(4)->get();
          
        
        

        return view('post',[
            'categories' => $categories,
            'post' => $post,
            'latestPost' => $latestPosts
         ]);
    }

    public function posts()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'DESC')->take(1000)->get();
      
        return view('posts',[
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function postByCategory($category)
    {
        $categories = Category::all();
        $category = Category::where('name', '=', $category)->first();
        $categoryIdSelected = $category->id;
        $post = Post::where('category_id', '=', $categoryIdSelected)->get();
        return view('posts',[
            'categories' => $categories,
            'posts' => $post,
            'categoryIdSelected' => $categoryIdSelected
        ]);
    }

   
}

