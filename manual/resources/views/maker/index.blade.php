<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maker</title>
</head>
<body>
    <div>
        <form action="{{ route('maker.store') }}" method="POST">
            @csrf
            <div>
                メーカー名：
                <input name="name"/>
            </div>
            <button>登録</button>
        </form>

        <p>メーカー一覧</p>
        <ul>
            @foreach ($makers as $maker)
                <li>{{ $maker->name }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>