document.addEventListener('DOMContentLoaded', function () {
    console.log("Filtering triggered");

    const container = document.querySelector('.card-container');
    const cards = Array.from(container.querySelectorAll('.card'));

    const categorySelect = document.getElementById('categoryFilter');
    const timeSelect = document.getElementById('timeFilter');
    const sortToggle = document.getElementById('sortToggle');

    let ascending = true;

    function applyFilters() {
        const selectedCategory = categorySelect.value;
        const maxTime = parseInt(timeSelect.value || '999');

        cards.forEach(card => {
            const cardCategory = card.dataset.category;
            const cardTime = parseInt(card.dataset.time || '0');

            const categoryMatch = !selectedCategory || cardCategory === selectedCategory;
            const timeMatch = cardTime <= maxTime;

            card.style.display = (categoryMatch && timeMatch) ? '' : 'none';
        });

        // Also reapply sorting so the visible cards stay sorted
        applySorting(true); // pass true to indicate it's a filter-triggered sort
    }

    function applySorting(isFilterCall = false) {
        const visibleCards = cards.filter(card => card.style.display !== 'none');

        visibleCards.sort((a, b) => {
            const nameA = a.dataset.name;
            const nameB = b.dataset.name;
            return ascending ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
        });

        visibleCards.forEach(card => container.appendChild(card));

        if (!isFilterCall) {
            ascending = !ascending;
            sortToggle.textContent = ascending ? 'Sort A-Z' : 'Sort Z-A';
        }
    }

    categorySelect.addEventListener('change', applyFilters);
    timeSelect.addEventListener('change', applyFilters);
    sortToggle.addEventListener('click', () => applySorting(false));
});