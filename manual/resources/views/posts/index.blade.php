<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    <form action="{{ route('posts.index') }}" method="GET">
        <input type="text" name="search" value="{{request('search')}}" placeholder="キーワードを入力">
        <button type="submit">検索</button>
    </form>
    
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->model_number }}</a>

                <br>
                @if ($post->product_photo)
                    <img src="{{ asset('storage/' . $post->product_photo) }}" style="width: 200px">                  
                @endif 
            </li><br><br>

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
        @endforeach
    </ul>
    <a href="{{ route('profile') }}">マイページに戻る</a><br>
    
</body>
</html>
