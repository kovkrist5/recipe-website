@extends('layouts.app')

@section('content')
@section('title', '| Create Recipe')
@section('css', '../css/front.css')

<div class="recipe-form-container">
    <h1>Create Recipe</h1>
    <form action="{{ route('store') }}" method="post">
        @csrf
        <fieldset>
            <label for="name"><b>Recipe Name:</b> </label>
            <input type="text" name="name" id="name">
        </fieldset>
        <fieldset>
           
            <select name="courseId">
                <option value="">choose type of course...</option>
                @foreach ($course as $c)
                    <option value="{{ $c->id }}">{{ $c->courseName }}</option>
                @endforeach
            </select>
        </fieldset>
       <fieldset>
        <label for="image" class="custom-file-upload"> Click to Upload Image </label>
        <input type="file" id="image" name="image" accept="image/*" style="display: none;">
        </fieldset> <!--watch a video about this!!!!!!!!!!!!!!-->


        <fieldset>
            <label for="desc"><b>Description:</b> </label>
            <input type="text" name="desc" id="desc">
        </fieldset>

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

        <fieldset>
            <div class="allergen-container">
                <label for="allergens"><b>Allergens:</b></label>
                <div class="allergen-grid">
                     <!--find out why it sends as null-->
                    @foreach($alg as $a)
                        <div class="allergen-item">
                            <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="{{ $a->id }}">
                            <label for="{{ $a->id }}">{{ $a->allergenName }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </fieldset>
        <!--PREP AND COOKTIME-->
        <br>
        <button type="submit">Save</button>
    </form>
</div>

<br>
<script src="{{ asset('js/DynamicList.js') }}"></script>
@endsection
</fieldset>