<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Maker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $makers = Maker::all();
        return view('posts.create',compact("categories","makers"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'maker_id' => 'required|exists:makers,id',
            'model_number' => 'required|string|max:225',
            'product_photo' => 'nullable|image',
            'manual_photo' => 'required|image',
        ]);

        $post = new Post([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'maker_id' => $request->maker_id,
            'model_number' => $request->model_number,
            'product_photo' => $request->file('product_photo') ? $request->file('product_photo')->store('product_photo','public') : null,
            'manual_photo' => $request->file('manual_photo')->store('manual_photo','public')
        ]);
        $post->save();
        return redirect()->route('posts.create');
    }

    //投稿一覧表示
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    
    //ユーザー名・カテゴリー・メーカーのnameを取得して詳細に表示
    public function show($id)
    {
        $post = Post::findOrFail($id); 
        $post->load('user'); 

        $category = Category::findOrFail($post->category_id);
        $maker = Maker::findOrFail($post->maker_id);
    
        return view('posts.show', ['post' => $post , 'category' => $category , 'maker' => $maker]);
    }

    //編集機能
    public function edit($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id()) // ログイン中のユーザーが編集しようとしていることを確認
                    ->first();

        $categories = Category::all(); 
        $makers = Maker::all(); 

        return view('posts.edit', compact('post' , 'categories', 'makers'));
    }

    public function update(Request $request, $post_id)
{
    $request->validate([
        'model_number' => 'required|string|max:255',
        'product_photo' => 'nullable|image',
        'manual_photo' => 'nullable|image'
    ]);

    $post = Post::findOrFail($post_id);

    // データを更新する
    $post->model_number = $request->input('model_number');

    // 商品写真の更新
    if ($request->hasFile('product_photo')) {
        // 新しいファイルを保存して、古いファイルを削除する
        $post->product_photo = $request->file('product_photo')->store('product_photo', 'public');
        Storage::disk('public')->delete($post->getOriginal('product_photo'));
    }

    // 説明書写真の更新
    if ($request->hasFile('manual_photo')) {
        // 新しいファイルを保存して、古いファイルを削除する
        $post->manual_photo = $request->file('manual_photo')->store('manual_photo', 'public');
        Storage::disk('public')->delete($post->getOriginal('manual_photo'));
    }

    $post->save();
    return redirect()->route('posts.show', $post_id);
}


    //削除機能
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

}
