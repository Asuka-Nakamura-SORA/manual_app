<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録画面</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <div class="login-screen">
        <div class="app-title">
            <h1>会員登録</h1>
        </div>   
        <div class="login-form">
            <div class="control-group">    
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <label for="name">名前</label>
                    <input type="text" name="name" id="name"><br>
                        @error('name')
                        <span>{{ $message }}</span>
                        @enderror
                    <label for="email">メールアドレス</label>
                    <input name="email" id="email">
                        @error('email')
                        <span>{{ $message }}</span>
                        @enderror
                    <label for="password">パスワード</label>
                    <input type="password" name="password" id="password">
                        @error('password')
                        <span>{{ $message }}</span>
                        @enderror
                    <button type="submit" class="btn btn-primary btn-large btn-block">登録</button>
                </form> 
                <a href="{{ route('login') }}">ログインはこちら</a>   
            </div>
        </div>
    </div>
</body>
</html>