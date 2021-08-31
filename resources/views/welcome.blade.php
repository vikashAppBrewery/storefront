<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
</head>
<body>
    <div style="display:flex; float:right">
        <a href="/register">Register</a>|
        <a href="/login">Login</a>
    </div>
    <div>
        <h1>Dashboard Page</h1>
    </div>
    <div>
        <a href="{{url('/') }}">Dashboard</a>|
        <a href="{{route('abo')}}">About</a>|
        <a href="{{URL::to('/contact')}}">Contact</a>
    </div>
</body>
</html>

 