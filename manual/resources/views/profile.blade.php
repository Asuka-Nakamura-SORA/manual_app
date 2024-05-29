<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>torisetu</h1>
    <p>{{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。</p><br>

    <a href="{{ route('posts.create') }}">新規投稿</a><br>
    <a href="{{ route('posts.index') }}">投稿一覧</a><br>
    <a href="{{ route('category.index') }}">カテゴリ管理</a><br>
    <a href="{{ route('maker.index') }}">メーカー管理</a>
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
                        <a href="{{ route('posts.show' , ['id' => $bookmark->id]) }}">詳細を見る</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <button>ログアウト</button>
    </form>
</body>
</html>