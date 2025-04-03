@extends('layouts.app')
@section('content')
@section('title', '| Show Recipe')
@section('css', '../../css/front.css')

<div class="recipe-show-container">
    <h1>{{ $dish->name }}</h1>
    <div class="recipe-content">
        <div class="recipe-image">
            <img src="../dishimg/{{ $dish->img }}" alt="{{ $dish->name }}">
        </div>
        <div class="recipe-details">
            <p><b>Description:</b> {{ $dish->desc }}</p>
            <p><b>Course:</b> {{ $dish->course->courseName }}</p>
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
                @foreach ($dish->allergens as $a )
                    {{$a->allergenName}}<!--baby make this look gorgeous like you pretty please-->
                @endforeach
              
            </ul>
            <button><a href="{{ route('edit' ,$dish->id)}}">edit recipe</a></button>
            <button id="delete-button" ><a href="{{ route('dish/delete' ,$dish->id)}}">delete recipe</a></button><!--make it muted red please, also align right-->
            </div>
        </div>
    </div>
</div>

@endsection