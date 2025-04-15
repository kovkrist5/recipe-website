@extends('layouts.app')
@section('content')
@section('title', '| Show Recipe')
@section('css', '../../css/front.css')
    <!--make it so times show up and take out one of the allergen labels-->
    <div class="recipe-show-container">
        <h1>{{ $dish->name }}</h1>
        <div class="recipe-content">
            <div class="recipe-image">
                @php
                    $imgSrc = $dish->img ? asset('dishimg/' . $dish->img) : asset('placeholder/default.jpg');
                @endphp
                <img src="{{ $imgSrc }}" alt="{{ $dish->name }}" class="recipe-image">

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
                <div class="recipe-details">

                    <p><b>Preparation Time:</b> {{ $dish->prep_time }} minutes</p>
                    <p><b>Cook Time:</b> {{ $dish->cook_time }} minutes</p>

                    <p><b>Allergens:</b></p>
                    <div class="allergen-tags">
                        @foreach ($dish->allergens as $a)
                            <span class="tag">{{ $a->allergenName }}</span>
                        @endforeach
                    </div> <!--baby make this look gorgeous like you pretty please-->
                    <p></p>
                    <button><a href="{{ route('edit', $dish->id)}}">edit recipe</a></button>
                    <button id="delete-button"><a href="{{ route('dish/delete', $dish->id)}}">delete
                            recipe</a></button><!--make it muted red please, also align right-->
                </div>
            </div>
        </div>
    </div>

@endsection
