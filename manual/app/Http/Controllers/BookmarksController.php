<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
    public function store($postId)
    {
        Auth::user()->bookmarks()->attach($postId);

        return redirect()->back();
    }

    public function destroy($postId)
    {
        $post = post::find($postId);
        Auth::user()->bookmarks()->detach($post);

        return redirect()->back();
    }
}
