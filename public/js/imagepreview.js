document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');
    const deleteBtn = document.getElementById('deleteImageBtn');

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'flex';
                };

                reader.readAsDataURL(file);
            }
        });
    }

    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            imageInput.value = '';
            previewContainer.style.display = 'none';
            previewImage.src = '#';
        });
    }
});
