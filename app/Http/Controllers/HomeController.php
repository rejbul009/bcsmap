<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('welcome', compact('recentPosts'));
    }
}
