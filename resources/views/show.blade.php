<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/show.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="topnav">
            <div class="nav-links">
                <a class="active" href="/home">Home</a>
                <a href="/about">About</a>
                <a href="/services">Services</a>
                <a href="/create">Add new recipe</a>
                <a href="#contact">Contact</a>
            </div>
            <input type="text" placeholder="Search...">
        </div>
    </header>
<div class="recipe-header-container">
    <h1> {{$dish->name}} </h1>
    <button><a href="{{ route('dish/edit' ,$dish->id)}}">edit recipe</a></button>
</div>
</body>
</html>

