<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'images'])->latest()->paginate(10);
        return view("home", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->hasFile('images'), $request->all(), $request->files->all());

        $request->validate([
            'content' => ['nullable', 'string', 'max:2000'],
            'images' => ['nullable', 'array', 'max:6', 'required_without:content'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Must have at least content OR image
        if (!$request->filled('content') && !$request->hasFile('images')) {
            return back()->withErrors([
                'content' => 'Please add text or at least one image.'
            ]);
        }

        $storedPaths = [];
        $post = null;

        try {

            logger('STEP 1 — before transaction');

            DB::transaction(function () use ($request, &$storedPaths, &$post) {

                logger('STEP 2 — creating post');

                $post = Post::create([
                    'user_id' => Auth::id(),
                    'content' => $request->input('content'),
                    'image_path' => null,
                ]);

                logger('STEP 3 — post created');

                if ($request->hasFile('images')) {

                    logger('STEP 4 — storing images');

                    foreach ($request->file('images') as $index => $image) {

                        $path = $image->store('posts', 'public');

                        logger('STEP 5 — stored: '.$path);

                        $post->images()->create([
                            'path' => $path,
                            'sort_order' => $index,
                        ]);
                    }
                }

            });

        } catch (\Throwable $e) {

            logger('ERROR: '.$e->getMessage());

            dd($e->getMessage());
        }


        return back()->with('success', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //abort_unless(Auth::check(), 403);
        //abort_unless(Auth::id() === $post->user_id, 403);

        $this->authorize('delete', $post);

        // Delete images from storage first
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }
        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $post->delete();

        return back()->with('success', 'Post deleted successfully.');
    }
}
