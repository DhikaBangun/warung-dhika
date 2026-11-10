<?php
namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('diterbitkan', true)
            ->latest()
            ->get();

        return view('bloguser.index', compact('posts'));
    }

    public function show(Post $post)
    {
        if (! $post->diterbitkan) {
            abort(404);
        }

        return view('bloguser.show', compact('post'));
    }
}
