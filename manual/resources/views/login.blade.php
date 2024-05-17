<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form action="" method="post">
        @csrf
        <label for="email">メールアドレス</label>
        <input name="email" id="email">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <button type="submit">送信</button>
    </form>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
    @endif

</body>
</html>