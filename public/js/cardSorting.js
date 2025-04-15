document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('sortToggle');
    const container = document.querySelector('.card-container');
    let ascending = true;

    toggleBtn.addEventListener('click', () => {
        const cards = Array.from(container.querySelectorAll('.card'));

        cards.sort((a, b) => {
            const nameA = a.dataset.name;
            const nameB = b.dataset.name;

            if (ascending) {
                return nameA.localeCompare(nameB);
            } else {
                return nameB.localeCompare(nameA);
            }
        });

        // Re-append sorted cards
        cards.forEach(card => container.appendChild(card));

        // Flip sort direction and update button text
        ascending = !ascending;
        toggleBtn.textContent = ascending ? 'Sort A-Z' : 'Sort Z-A';
    });
});
