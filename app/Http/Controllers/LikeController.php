<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //

    public function toggle(Post $post)
    {
        try {
            $user = request()->user();

            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $like = $post->likes()->where('user_id', $user->id)->first();

            if ($like) {
                $like->delete();
                $liked = false;
            } else {
                $newLike = $post->likes()->create([
                    'user_id' => $user->id
                ]);

                if (!$newLike) {
                    throw new \Exception('Like not created');
                }

                $liked = true;
            }

            return response()->json([
                'liked' => $liked,
                'count' => $post->likes()->count()
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
