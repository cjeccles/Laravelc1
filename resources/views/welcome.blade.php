<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" />
        <input type="email" name="email" placeholder="Email Address" />
        <input type="password" name="password" id="password" placeholder="Password" />
        <button>Sign Up</button>

        <ul>
            @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
            @endforeach
        </ul>
    </form>
</body>
</html>