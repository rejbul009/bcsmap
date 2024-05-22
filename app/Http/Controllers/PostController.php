<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts', compact('posts'));
    }




    public function usersearch(Request $request)
    {
        $query = $request->input('searchQuery');
        
        // Perform search logic, for example:
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();
        
        // Return the view with the search results
        return view('user.search-results', ['results' => $posts]);
    }
    

    public function search(Request $request)
    {
        $query = $request->input('searchQuery');
        
        // Perform search logic, for example:
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();
        
        // Return the view with the search results
        return view('admin.search-results', ['results' => $posts]);
    }



    
    public function create()
    {
        $categories = Category::all();
        return view('admin.postcreate', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',

    ]);
    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->user_id = auth()->id();
    $post->category_id = $request->category_id;


    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
        $image->move(public_path('upload/admin_postimage'), $filename);

        $post->image = $filename;

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

}

    
    public function show(Post $post)
    {
        return view('admin.singlepost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.postedit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
      // Validation
      $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
      ];
    
      if ($request->hasFile('image')) {
        $rules['image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
      }
    
      $request->validate($rules);
    
      $post->title = $request->title;
      $post->content = $request->content;
    
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
        $image->move(public_path('upload/admin_postimage'), $filename);
    
        $post->image = $filename;
      }
    
      $post->save();
    
      return redirect()->route('posts.index', $post->id)->with('success', 'Post updated successfully.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Check if the post has an associated image and delete it
        if ($post->image && file_exists(public_path('images/' . $post->image))) {
            unlink(public_path('images/' . $post->image));
        }

        // Delete the post
        $post->delete();

        // Redirect to the posts index with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

    public function postsByCategory($categoryId)
    {
        $posts = Post::where('category_id', $categoryId)->get();
        return view('user.posts-by-category', compact('posts'));
    }

   
}
