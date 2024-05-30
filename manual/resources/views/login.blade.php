<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>ログイン</h1>
            </div>

            <div class="login-form">
                <div class="control-group">    
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <label for="email">メールアドレス</label>
                        <input name="email" id="email">
                        <label for="password">パスワード</label>
                        <input type="password" name="password" id="password">
                        <button type="submit" class="btn btn-primary btn-large btn-block">ログイン</button>
                    </form> 
                    
                        @if ($errors->any())
                            <div>
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                        @endif                       
                        <a href="{{ route('register') }}">会員登録はこちら</a>                   
                </div>
            </div>
        </div>
    </div>
</body>
</html>
