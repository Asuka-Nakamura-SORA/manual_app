<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->number_name = $request->number_name;
        $post->product_photo = $request->product_photo;
        $post->manual_photo = $request->manual_photo;
        $post->save();
        return redirect()->route('post.create');
    }
}
