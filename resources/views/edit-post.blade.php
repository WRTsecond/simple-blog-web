<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/edit-post.css')}}">
    <title>Edit Your Post</title>
</head>
<body>
    <div class="edit-post">
    <h1>Edit Post</h1>
    <form action="edit-post{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$post->title}}">
        <textarea name="content">{{$post->content}}</textarea>
        <button>Save</button>
    </form>
    </div>
</body>
</html>
