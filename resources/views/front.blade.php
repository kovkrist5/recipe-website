

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet"href="./css/front.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <h1>front page</h1>
    <button><a href="/create">new recipe</a></button>
    <ul>
        @foreach ($dish as $d)
            <div class="card">
                <div class="container">
                    <ul id="headlist">
                        <li><a href="{{ route('dish' ,$d->id)}}">{{ $d->id }} - {{ $d->name }}</a></li>
                    </ul>
                </div>
            </div>
    </ul>
    @endforeach


</body>

</html>
