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
        <input type="email" name="email" id="email">
            @if ($errors->first('email'))
            <p class="validation">※{{$errors->first('email')}}</p>
            @endif
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
            @if ($errors->first('password'))
            <p class="validation">※{{$errors->first('password')}}</p>
            @endif
        <button type="submit">送信</button>
    </form>
</body>
</html>