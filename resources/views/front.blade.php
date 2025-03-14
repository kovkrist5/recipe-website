@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <!--images like this: <a> <img> </a>-->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/front.css" type="text/css">
        <title>Document</title>
    </head>

    <header>
        <div class="topnav">
            <div class="nav-links">
                <a class="active" href="/home">Home</a>
                <a href="/about">About</a>
                <a href="/services">Services</a>
                <a href="/create">Add new recipe</a>
                <a href="#contact">Contact</a>
            </div>
            <input class="searching" type="text" placeholder="Search...">
        </div>
    </header>

    <h1>Recipes here:</h1>

    <body>
        
        <main>
            <div class="card-container">
                @foreach ($dish as $d)
                    <div class="card">
                        <div><a href="{{ route('dish', $d->id) }}">{{ $d->id }} - {{ $d->name }}</a></div>
                        
                        <img src="{{$d->img}}" alt="">
                    </div>
                @endforeach
            </div>

        </main>
    </body>

    </html>
