@extends('layouts.app')

@section('title', '| Front oldal')
@section('css', '../css/front.css')

@section('content')
<h1>Recipes:</h1>

<main>
    <div class="sort-container">
        <!-- FILTERS -->
        <div class="filter-container">
            <label for="categoryFilter">Category:</label>
            <select id="categoryFilter">
                <option value="">All</option>
                @foreach ($course as $c)
                    <option value="{{ strtolower($c->courseName) }}">{{ $c->courseName }}</option>
                @endforeach
            </select>
            <button id="sortToggle">Sort A-Z</button>
        </div>
    </div>

    <div class="card-container">
        @foreach ($dish as $d)
            <div class="card" data-name="{{ strtolower($d->name) }}"
                data-category="{{ strtolower($d->course->courseName ?? 'other') }}"
                data-time="{{ $d->prep_time ?? 0 }}">

                <div><a href="{{ route('dish', $d->id) }}">{{ $d->name }}</a></div>

                @php
                    $imgPath = public_path('dishimg/' . $d->img);
                    $imgSrc = (isset($d->img) && File::exists($imgPath)) 
                        ? asset('dishimg/' . $d->img) 
                        : asset('placeholder/dish.jpg');
                @endphp

                <img src="{{ $imgSrc }}" alt="{{ $d->name }}" class="recipe-image">

                <div class="card-body">
                    <p>{{ $d->desc ?? 'No description available' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</main>


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categoryFilter = document.getElementById('categoryFilter');
            const cards = document.querySelectorAll('.card');

            categoryFilter.addEventListener('change', () => {
                const selectedCategory = categoryFilter.value.toLowerCase();

                cards.forEach(card => {
                    const cardCategory = card.dataset.category.toLowerCase();
                    const showCard = !selectedCategory || cardCategory === selectedCategory;
                    card.style.display = showCard ? 'block' : 'none';
                });
            });
        });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const categoryFilter = document.getElementById('categoryFilter');
        const cards = document.querySelectorAll('.card');

        categoryFilter.addEventListener('change', () => {
            const selectedCategory = categoryFilter.value.toLowerCase();

            cards.forEach(card => {
                const cardCategory = card.dataset.category.toLowerCase();

                const showCard = !selectedCategory || cardCategory === selectedCategory;
                card.style.display = showCard ? 'block' : 'none';
            });
        });
    });
</script>
@endsection
@endsection