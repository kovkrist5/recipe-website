@extends('layouts.app')

@section('content')
@section('title', '| Create Recipe')
@section('css', '../css/front.css')
    <!-- ALIGN EVERYTHING TO THE CENTER !!!!!!!!!!!!! -->
    <!--      -->
    <fieldset id="body-of-the-page">
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
        <label for="image" class="custom-file-upload"> Click to Upload Image </label>
        <input type="file" id="image" name="image" accept="image/*" style="display: none;">
        </fieldset>


        <fieldset>
            <label for="desc"><b>Description:</b> </label>
            <input type="text" name="desc" id="desc">
        </fieldset>

        <fieldset>
            <fieldset>
                <label for="instructions"><b>Instructions:</b></label>
                <ol id="instructionsList" class="dynamic-list" data-input-name="instructions[]">
                    <li id="instructionsList_item_1">
                        <input type="text" name="instructions[]" id="instructionsList_input_1">
                        <button id="addButton" type="button" class="remove-btn" data-id="instructionsList_item_1">-</button>
                    </li>
                </ol>
            </fieldset>

            <fieldset>
                <label for="ingredients"><b>Ingredients:</b></label>
                <ol id="instructionsList" class="dynamic-list" data-input-name="ingredients[]">
                    <li id="ingredientsList_item_1">
                        <input type="text" name="ingredients[]" id="ingredientsList_input_1">
                        <button id="addButton" type="button" class="remove-btn" data-id="ingredientsList_item_1">-</button>
                    </li>
                </ol>
            </fieldset>
            <!-- Allergens Checkboxes -->

            <fieldset>

                <div class="allergen-container">
                    <label for="allegens"><b>Allergens:</b></label>
                    <!--find out why it sends as null-->
                    @foreach($alg as $a)
                        <div class="allergen-item">
                            <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="{{ $a->id }}">
                            <label for="{{ $a->id }}">{{ $a->allergenName }}</label>
                        </div>
                    @endforeach
                    <div class="allergen-container">
            </fieldset>
            <br>
            <button type="submit">Save</button>
    </form>
    <br>
    <!-- Include the external JavaScript file -->
    <script src="{{ asset('js/DynamicList.js') }}"></script>
    <!--make it more universal so we can use the same code for isnt and ing-->

@endsection
</fieldset>