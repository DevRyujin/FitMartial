<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    //

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->input('content')
        ]);

        $comment->load('user');

        return response()->json([
            'id' => $comment->id,
            'content' => $comment->content,
            'user' => $comment->user->name,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }
}
