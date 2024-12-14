<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/create-edit.css') }}">
</head>
<body>
<h1>Sửa bài viết</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.update', $posts->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Tiêu đề:</label>
    <input type="text" name="title" value="{{ $posts->title }}">
    <br>
    <label>Nội dung:</label>
    <textarea name="content">{{ $posts->content }}</textarea>
    <br>
    <button type="submit">Cập nhật</button>
</form>
<a href="{{ route('home') }}">Quay lại</a>

</body>
</html>