<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#js-hamburger').on('click', function() {
                $(this).toggleClass('active');
                $('#js-nav').toggleClass('active');
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header__inner">
                <h1 class="header__title header-title">
                    <a href="{{ route('profile') }}">トリセツ</a>
                </h1>

                <p>投稿一覧</p>

                <nav class="header__nav nav" id="js-nav">
                    <ul class="nav__items nav-items">
                        <li class="nav-items__item"><a href="{{ route('posts.create') }}">新規投稿</a></li>
                        <li class="nav-items__item"><a href="{{ route('category.index') }}">カテゴリ管理</a></li>
                        <li class="nav-items__item"><a href="{{ route('maker.index') }}">メーカー管理</a></li>
                        <li class="nav-items__item"><a href="{{ route('profile') }}">マイページ</a></li>
                    </ul>
                </nav>

                <button class="header__hamburger hamburger" id="js-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </header>

        <main>
            <div class="main">
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
            </div>
        </main>
    </div>
</body>
</html>
