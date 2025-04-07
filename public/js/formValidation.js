document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.edit_align');
    const courseSelect = document.getElementById('courseSelect');

    form.addEventListener('submit', function (e) {
        if (!courseSelect.value) {
            e.preventDefault();
            alert('Please choose a course type before submitting.');
            courseSelect.focus();
        }
    });
});
