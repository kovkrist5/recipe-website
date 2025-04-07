@section('content')

@extends('layouts.app')

@section('content')
@section('title', '| Front oldal')
@section('css', '../css/front.css')

    <!--images like this: <a> <img> </a>-->

    <h1>Recipes:</h1>

    <body>

        <main>
            <div class="sort-container">
                <button id="sortToggle">Sort A-Z</button>

            </div>

            <script src="{{ asset('js/cardSorting.js') }}"></script>
            <div class="card-container">
                @foreach ($dish as $d)
                            <div class="card" data-name="{{ strtolower($d->name) }}">
                                <div><a href="{{ route('dish', $d->id) }}">{{ $d->name }}</a></div>
                                @php
                                    $imgSrc = $d->img ? asset('dishimg/' . $d->img) : asset('placeholder/dish.jpg');
                                @endphp
                                <img src="{{ $imgSrc }}" alt="{{ $d->name }}" class="recipe-image">
                                <div class="card-body">
                                    <p>{{$d->desc ?? 'no desc available'}}</p>
                                </div>
                            </div>
                @endforeach
            </div>

        </main>

@endsection