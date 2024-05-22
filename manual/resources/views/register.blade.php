<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録画面</title>
</head>
<body>
    <h1>登録画面</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">名前</label>
        <input type="text" name="name" id="name"><br>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        <br>
        <label for="email">メールアドレス</label>
        <input name="email" id="email"><br>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        <br>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password"><br>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
            <br>
        <button type="submit">登録</button>
        <input type="button" value="戻る" onclick="window.history.back()">
    </form>
</body>
</html>