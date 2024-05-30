<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
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

                <p>新規投稿</p>

                <nav class="header__nav nav" id="js-nav">
                    <ul class="nav__items nav-items">
                        <li class="nav-items__item"><a href="{{ route('posts.index') }}">投稿一覧</a></li>
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
                @if($errors->any())
                    <ul">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('posts.create') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                        型番：<input name="model_number"/><br>
                        商品写真：<input type="file" name="product_photo"><br>
                        説明書写真：<input type="file" name="manual_photo"><br>
                        <label for="category_id">カテゴリー：</label>
                        <select name="category_id" id="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select><br>
                        <label for="maker_id">メーカー：</label>
                        <select name="maker_id" id="maker_id">
                            <option value="">選択してください</option>
                            @foreach ($makers as $maker)
                                <option value="{{$maker->id}}">{{$maker->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button>投稿</button>
                </form>
            </div>          
        </main>
    </div>
</body>
</html>