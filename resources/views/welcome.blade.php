<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database website</title>
</head>
<body>
    @auth
        <h2>Congrats u are in :3</h2>
        <form action="logout" method="GET">
            @csrf
            <button>Logout</button>
        </form>

        <div>
            <h2>Post Something</h2>
            <form action="create-post" method="POST">
                @csrf
                <input name="title" type="text" placeholder="Title">
                <textarea name="content" placeholder="Description"></textarea>
                <button>Post</button>
            </form>
        </div>

        <div class="posts">
            <h2>All Post</h2>
            @foreach($posts as $post)
                <div>
                    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                    <p>{{$post['content']}}</p>
                    <p><a href="edit-post{{$post->id}}">Edit</a></p>
                    <form action="delete-post{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    @else
    <div>
        <h2>Register</h2>
        <form action="register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            <button>Register</button>
        </form>
    </div>

    <div>
        <h2>Login</h2>
        <form action="login" method="GET">
            @csrf
            <input name="login-name" type="text" placeholder="name">
            <input name="login-password" type="password" placeholder="Password">
            <button>Login</button>
        </form>
    </div>
    @endauth

</body>
</html>
