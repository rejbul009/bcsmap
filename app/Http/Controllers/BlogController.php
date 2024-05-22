<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('user.blog', compact('posts'));
    }


    public function show($id)
{
    $post = Post::with('category')->findOrFail($id);
    $recentPosts = Post::orderBy('created_at', 'desc')->take(7)->get();
    $categories = Category::all();

    return view('user.blog-details', compact('post', 'recentPosts', 'categories'));
}

}

