@extends('layouts.app')
@section('content')

@section('content')
@section('title', '| Edit oldal')
@section('css', '../../css/front.css')

    <div class="container">
        <h1>Edit {{ $dish->name }}</h1>
        
        <form class="edit_align" action="{{ route('update', $dish->id) }}" method="post">
            <div>
                @method('PUT')
                <label for="name">Recipe Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $dish->name) }}">
                <br>
                <br>
                <label for="courseId">Select Type of Course:</label>

                <select name="courseId" id="courseId">
                    <option value="8">Other</option>
                </select>
                <button class="button_save" type="submit">Save</button>
            </div>
    </div>
    
    @endsection