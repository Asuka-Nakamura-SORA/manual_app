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
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->model_number }}
                <br>
                @if ($post->product_photo)
                    <img src="{{ asset('storage/' . $post->product_photo) }}" style="width: 200px">
                    
                @endif 
            </li>
        @endforeach
    </ul>
    <a href="{{ route('profile') }}">マイページに戻る</a><br>
    {{-- {{ $posts->links() }}  --}}
</body>
</html>
