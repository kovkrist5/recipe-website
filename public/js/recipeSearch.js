document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('recipeSearch');
        const searchButton = document.getElementById('searchButton');
        const cards = document.querySelectorAll('.card');

        function normalize(str) {
            return str.toLowerCase().trim();
        }

        function filterRecipes() {
            const query = normalize(searchInput.value);

            cards.forEach(card => {
                const name = card.dataset.name;
                if (!query || name.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        searchButton.addEventListener('click', filterRecipes);

        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                filterRecipes();
            }

            if (searchInput.value.trim() === '') {
                cards.forEach(card => card.style.display = '');
            }
        });
    });

