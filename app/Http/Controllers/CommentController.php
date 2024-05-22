<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Comment_reply; 
use Illuminate\Http\Request;

class CommentController extends Controller
{  public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return back();
    }
   

    public function destroy(Comment $comment)
    {
        // Ensure the user is authorized to delete the comment
        if (auth()->id() != $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        return back();
    }


    public function replyToComment($id, Request $request)
    {
       
        $request->validate([
            'content' => 'required|string', 
        ]);

        try {
           
            $comment = Comment::findOrFail($id);
            
          
            $reply = new Comment_reply ();
            $reply->user_id = auth()->id(); 
            $reply->post_id = $comment->post_id; 
            $reply->parent_id = $comment->id; 
            $reply->content = $request->input('content'); 
            $reply->save();
            
            return redirect()->back()->with('success', 'Reply added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add reply. Please try again.');
        }
}


}