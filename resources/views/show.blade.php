@extends('layouts.app')

@section('content')
@section('title', '| Show oldal')
@section('css', '../css/front.css')


<div class="recipe-header-container">
    <h1> {{$dish->name}} </h1>
    <a href=""><img src="{{$dish->img}}" alt="" srcset=""></a>
    <button><a href="{{ route('dish/edit' ,$dish->id)}}">edit recipe</a></button>
    <button id="delete_button" ><a href="{{ route('dish/delete' ,$dish->id)}}">delete recipe</a></button><!--make it muted red please, also align right-->
</div>

@endsection


