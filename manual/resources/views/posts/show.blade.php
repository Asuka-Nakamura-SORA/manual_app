<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿詳細</title>
</head>
<body>
        <div class="post">
            <h1>{{ $post->model_number }}</h1>
            <p>投稿者: {{ $post->user->name }}</p>
            <p>カテゴリー: {{ $category->name }}</p>
            <p>メーカー: {{ $maker->name }}</p>
            @if ($post->product_photo)
            <img src="{{ asset('storage/' . $post->product_photo) }}" style="width: 400px"><br>
            <img src="{{ asset('storage/' . $post->manual_photo) }}" style="width: 200px">
            @endif            
            <p>{{ $post->created_at }}</p>
            @if(Auth::user()->bookmarks->contains($post->id))
            <form action="{{ route('bookmarks.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="color: rgb(0, 0, 0);">
                    ブックマーク解除
                </button>
            </form>
        @else
            <form action="{{ route('bookmarks.store', $post->id) }}" method="POST">
                @csrf
                <button type="submit" style="color: rgb(255, 47, 0);">
                    ブックマークする
                </button>
            </form>
        @endif
            <form action="{{route('posts.edit' , ['post' => $post->id])}}" method="get">
                @csrf
                <button>編集</button>
            </form>
            <form action="{{route('posts.destroy' , ['post' => $post->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button>削除</button>
            </form>
            <a href="{{ route('posts.index') }}">投稿一覧へ戻る</a><br>
        </div>
</body>
</html>