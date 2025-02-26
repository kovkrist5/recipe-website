<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>front page</h1>
    <button><a href="/create">new recipe</a></button>

    <ul>
        @foreach($Dish as $d)
        <li>{{$d->id}} - {{$d->name}}</li>
    </ul>
    

     
</body>
</html>