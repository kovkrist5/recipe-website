@extends('layouts.app')
@section('content')
@section('title', '| Show Recipe')
@section('css', '../../css/front.css')

<div class="recipe-show-container">
    <h1>{{ $dish->name }}</h1>
    <div class="recipe-content">
        <div class="recipe-image">
            <img src="{{ asset('storage/images/' . $dish->image) }}" alt="{{ $dish->name }}">
        </div>
        <div class="recipe-details">
            <p><b>Description:</b> {{ $dish->desc }}</p>
            <p><b>Course:</b> {{ $dish->course }}</p>
            <p><b>Instructions:</b></p>
            <ol>
                @foreach ($dish->inst as $i)
                    <li>{{ $i }}</li>
                @endforeach
            </ol>
            <p><b>Ingredients:</b></p>
            <ul>
                @foreach ($dish->ing as $i)
                    <li>{{ $i }}</li>
                @endforeach
            </ul>
            <p><b>Allergens:</b></p>
            <ul>
                @foreach ($alg as $a)
                    {{$a->alg}}
                @endforeach
            </ul>
        </div>
    </div>
</div>
