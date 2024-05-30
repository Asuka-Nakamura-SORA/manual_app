<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotegory</title>
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

                <p>カテゴリ管理</p>

                <nav class="header__nav nav" id="js-nav">
                    <ul class="nav__items nav-items">
                        <li class="nav-items__item"><a href="{{ route('posts.create') }}">新規投稿</a></li>
                        <li class="nav-items__item"><a href="{{ route('posts.index') }}">投稿一覧</a></li>
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
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div>
                        カテゴリ名：
                        <input name="name"/>
                    </div>
                    <button>登録</button>
                </form><br>

                <p>カテゴリ一覧</p>
                <ul>
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</body>
</html>