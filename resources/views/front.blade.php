@section('content')

@extends('layouts.app')

@section('content')
@section('title', '| Front oldal')
@section('css', '../css/front.css')

    <!--images like this: <a> <img> </a>-->

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
  
@endsection