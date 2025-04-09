@extends('layouts.app')
@section('content')
@section('title', '| Edit oldal')
@section('css', '../../css/front.css')
<!--put time buttons in-->


    <div class="recipe-form-container">
        <h1>Edit {{$dish->name}}</h1>
        <form class="edit_align" action="{{ route('update', $dish->id) }}" method="post">
            @csrf
            <fieldset>
                <label for="name"><b>Recipe Name:</b> </label>
                <input type="text" name="name" id="name" value="{{ old('name', $dish->name) }}">
            </fieldset>
            <fieldset>

                <select name="courseId" id="courseSelect" required>
                    <option value="" disabled selected>-- Select a course --</option>
                    @foreach ($course as $c)
                        <option value="{{ $c->id }}" {{ $dish->course->id == $c->id ? 'selected' : '' }}>{{$c->courseName}}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset>
                <label for="image" class="custom-file-upload">Click to Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" style="display: none;">

                <!-- Image Preview Container -->
                <div id="imagePreviewContainer" class="image-preview-container" style="display: none;">
                    <img id="imagePreview" class="recipe-image" src="#" alt="Image Preview">
                    <button type="button" id="deleteImageBtn" class="delete-image-btn">Delete Image</button>
                </div>
            </fieldset> <!--watch a video about this!!!!!!!!!!!!!!-->


            <fieldset>
                <label for="desc"><b>Description:</b> </label>
                <input type="text" name="desc" id="desc" value="{{ old('desc', $dish->desc) }}">
            </fieldset>

            <fieldset>

                <label for="instructions"><b>Instructions:</b></label>
                <ol id="instructionsList" class="dynamic-list" data-input-name="instructions[]">
                    @foreach ($dish->inst as $i)
                        <li id="instructionsList_item_1">
                            <input type="text" value="{{ old('inst', $i) }}" name="instructions[]"
                                id="instructionsList_input_1">
                            <button id="addButton" type="button" class="remove-btn" data-id="instructionsList_item_1">-</button>
                        </li>
                    @endforeach
                </ol>
            </fieldset>

            <fieldset>
                <label for="ingredients"><b>Ingredients:</b></label>
                <ol id="instructionsList" class="dynamic-list" data-input-name="ingredients[]">
                    @foreach ($dish->ing as $i)
                        <li id="ingredientsList_item_1">
                            <input type="text" value="{{ old('ing', $i) }}" name="ingredients[]" id="ingredientsList_input_1">
                            <button id="addButton" type="button" class="remove-btn" data-id="ingredientsList_item_1">-</button>
                        </li>
                    @endforeach
                </ol>
            </fieldset>

            <fieldset>
                <div class="allergen-container">
                    <label for="allergens"><b>Allergens:</b></label>
                    <div class="allergen-grid">

                        @foreach($alg as $a)
                            <div class="allergen-item">
                                <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="alg-{{ $a->id }}" {{ in_array($a->id, $dish->allergens->pluck('id')->toArray()) ? 'checked' : '' }}>
                                <label for="alg-{{ $a->id }}" class="allergen-btn">{{ $a->allergenName }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </fieldset>

            <br>
            <button type="submit">Save</button>
        </form>
    </div>

    <br>
    <script src="{{ asset('js/DynamicList.js') }}"></script>
@endsection
</fieldset>
<script src="{{ asset('js/imagePreview.js') }}"></script>