<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotegory</title>
</head>
<body>
    
    <div>
        <form action="{{ route('category.create') }}" method="POST">
            @csrf
            <div>
                カテゴリ名：
                <input name="name"/>
            </div>
            <button>登録</button>
        </form>
    </div>
</body>
</html>