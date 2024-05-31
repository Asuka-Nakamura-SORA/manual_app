<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maker</title>
    <link rel="stylesheet" href="{{ asset('css/category-maker.css') }}">
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

                <p>メーカー管理</p>

                <nav class="header__nav nav" id="js-nav">
                    <ul class="nav__items nav-items">
                        <li class="nav-items__item"><a href="{{ route('posts.create') }}">新規投稿</a></li>
                        <li class="nav-items__item"><a href="{{ route('posts.index') }}">投稿一覧</a></li>
                        <li class="nav-items__item"><a href="{{ route('category.index') }}">カテゴリ管理</a></li>
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
                <div class="Form">
                    <form action="{{ route('maker.store') }}" method="POST">
                        @csrf
                        <div class="Form-Item">
                            <p class="Form-Item-Label">
                                <span class="Form-Item-Label-Required">必須</span>メーカー名
                            </p>
                            <input name="name" class="Form-Item-Input"/>
                        </div>
                        <input type="submit" class="Form-Btn" value="登録">
                    </form>
                </div>
                <p>メーカー一覧</p>
                <ul>
                    @foreach ($makers as $maker)
                        <li>{{ $maker->name }}</li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</body>
</html>