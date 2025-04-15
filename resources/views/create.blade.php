
@extends('layouts.app')

@section('content')
@section('title', '| Create Recipe')
@section('css', '/css/front.css')

    <div class="recipe-form-container">
        <h1>Create Recipe</h1>
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
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
                <label for="image" class="custom-file-upload">Click to Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" style="display: none;">

                <!-- Image Preview Container -->
                <div id="imagePreviewContainer" class="image-preview-container" style="display: none;">
                    <img id="imagePreview" class="recipe-image" src="#" alt="Image Preview">
                    <button type="button" id="deleteImageBtn" class="delete-image-btn">Delete Image</button>
                </div>
            </fieldset>
            <!--watch a video about this!!!!!!!!!!!!!!-->


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
                <div class="time-input-group">
                    <label for="prep_time"><b>Preparation Time (minutes):</b></label>
                    <input type="number" name="prep" id="prep" min="0" step="5" value="0">
                </div>

                <div class="time-input-group">
                    <label for="cook_time"><b>Cook Time (minutes):</b></label>
                    <input type="number" name="cooktime" id="cooktime" min="0" step="5" value="0">
                </div>
            </fieldset>

            <fieldset>
                <div class="allergen-container">
                    <label for="allergens"><b>Allergens:</b></label>
                    <div class="allergen-grid">

                        @foreach($alg as $a)
                            <div class="allergen-item">
                                <input type="checkbox" name="allergens[]" value="{{ $a->id }}" id="alg-{{ $a->id }}">
                                <label for="alg-{{ $a->id }}" class="allergen-btn">{{ $a->allergenName }}</label>
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
<script src="{{ asset('js/imagePreview.js') }}"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');
    const deleteBtn = document.getElementById('deleteImageBtn');
    const form = document.querySelector('form');
    const courseSelect = document.querySelector('select[name="courseId"]');

    let previewDataURL = null; // 💾 keep image in memory

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewDataURL = e.target.result; // store it
                    previewImage.src = previewDataURL;
                    previewContainer.style.display = 'flex';
                };

                reader.readAsDataURL(file);
            }
        });
    }

    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            imageInput.value = '';
            previewDataURL = null;
            previewContainer.style.display = 'none';
            previewImage.src = '#';
        });
    }

    if (form) {
        form.addEventListener('submit', function (e) {
            let hasError = false;

            // Basic validation
            if (!courseSelect.value) {
                alert("Recipe can't go through because course type isn't specified.");
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();

                // 🧠 Reapply preview if it vanished for some reason
                if (previewDataURL) {
                    previewImage.src = previewDataURL;
                    previewContainer.style.display = 'flex';
                }
            }
        });
    }
});
</script>

    