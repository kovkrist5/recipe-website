@extends('layouts.app')

@section('content')
@section('title', '| Create Recipe') 
@section('css', '../css/front.css')

    <h1>Create Recipe</h1>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <fieldset>
            <label for="name"><b>Recipe Name:</b> </label>
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
            <label for="desc"><b>Description:</b> </label>
            <input type="text" name="desc" id="desc">
        </fieldset>

  <fieldset>
    <label for="instructions"><b>Instructions:</b></label>
    <ol id="instructionsList">
        <li id="instruction_item_1">
            <input type="text" name="instructions[]" id="instruction_1">
            <button type="button" class="remove-btn" data-id="instruction_item_1">-</button>
            <button type="button" id="addButton">+</button>
        </li>
    </ol>
</fieldset>
        <!-- Allergens Checkboxes -->
       
        <fieldset>

        <div class="allergen-container">
        <label for="allegens"><b>Allergens:</b></label>

            @foreach($alg as $a)
                <div class="allergen-item">
                <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="allergen_{{ $a->id }}">
                <label for="allergen_{{ $a->id }}">{{ $a->allergenName }}</label>
                </div>
            @endforeach
            <div class="allergen-container">
        </fieldset>
        <br>
        <button type="submit">Save</button>
    </form>
    <br>
    <!-- Include the external JavaScript file -->
    <script src="{{ asset('js/addInstructions.js') }}"></script>

@endsection
