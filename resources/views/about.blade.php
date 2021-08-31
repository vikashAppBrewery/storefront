<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
</head>
<body>
    <h1>About us Page</h1>
    <div>
        <a href="{{url('/') }}">Home</a>|
        <a href="{{route('abo')}}">About</a>|
        <a href="{{URL::to('/contact')}}">Contact</a>
    </div>
    <h1>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur nam labore reiciendis, consectetur eius beatae aut nostrum voluptatibus necessitatibus, quidem dignissimos neque, qui vitae est laudantium saepe unde error hic.</h1>
</body>
</html>