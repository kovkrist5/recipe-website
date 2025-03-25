@extends('layouts.app')

@section('content')
@section('title', '| Create Recipe') 
@section('css', '../css/front.css')

    <h1>Create Recipe</h1>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <fieldset>
            <label for="name">Recipe Name: </label>
            <input type="text" name="name" id="name">
        </fieldset>
        <fieldset>
            <select name="courseId">
                @foreach ($course as $c)
                    <option value="{{ $c->id }}">{{ $c->courseName }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset>
            <label for="desc">Description: </label>
            <input type="text" name="desc" id="desc">
        </fieldset>

        <fieldset>
            <label for="instructions">Instructions: </label>
            <ol id="instructionsList">
                <li id="instruction_item_1">
                    <input type="text" name="instructions[]" id="instruction_1">
                    <button type="button" onclick="removeInput('instruction_item_1')">-</button>
                </li>
            </ol>
            <button type="button" id="addButton">+</button>
        </fieldset>

        <!-- Allergens Checkboxes -->
        <fieldset>
            @foreach($alg as $a)
                <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="allergen_{{ $a->id }}">
                <label for="allergen_{{ $a->id }}">{{ $a->allergenName }}</label>
            @endforeach
        </fieldset>

        <button type="submit">Save</button>
    </form>

    <!-- Include the external JavaScript file -->
    <script src="{{ asset('js/addInstructions.js') }}"></script>

@endsection
