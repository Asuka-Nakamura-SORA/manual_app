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
                </select>
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
    <a href="{{ route('profile') }}">マイページに戻る</a><br>
</body>
</html>