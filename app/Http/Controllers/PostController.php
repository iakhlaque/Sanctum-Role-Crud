<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view posts');
        return Post::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create posts');

        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        $this->authorize('view posts');
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('edit posts');

        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete posts');

        $post->delete();
        return response()->json(null, 204);
    }
}
