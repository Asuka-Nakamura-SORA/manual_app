<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
</head>
<body>
    <div>
        <form action="{{ route('posts.create') }}" method="POST">
            @csrf
            <div>
                型番：
                <input name="number_name"/>
            </div>
            <div>
                商品写真：
                <input name="product_photo"/>
            </div>
            <div>
                説明書写真：
                <input name="manual_photo"/>
            </div>
            <button>投稿</button>
        </form>
    </div>

</body>
</html>
