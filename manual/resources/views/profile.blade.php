<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}さんのマイページ</p>

                <nav class="header__nav" id="js-nav">
                    <ul class="nav__items">
                        <li class="nav-items__item"><a href="{{ route('posts.index') }}">投稿一覧</a></li>
                        <li class="nav-items__item"><a href="{{ route('category.index') }}">カテゴリ管理</a></li>
                        <li class="nav-items__item"><a href="{{ route('maker.index') }}">メーカー管理</a></li>
                        <form action="{{route('user.logout')}}" method="post" class="btn btn-primary btn-large btn-block">
                            @csrf
                            <button>ログアウト</button>
                        </form>
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
                <table>
                    <thead>
                        <tr>
                            <th>型番</th>
                            <th>カテゴリー</th>
                            <th>メーカー</th>
                            <th>投稿者</th>
                            <th>詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookmarks as $bookmark)
                            <tr>
                                <td>{{ $bookmark->model_number}}</td>
                                <td>{{ $bookmark->category->name }}</td>
                                <td>{{ $bookmark->maker->name }}</td>
                                <td>{{ $bookmark->user->name }}</td>
                                <td>
                                    <a href="{{ route('posts.show' , ['id' => $bookmark->id]) }}">詳細</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>