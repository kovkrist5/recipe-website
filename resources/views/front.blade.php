@section('content')

@extends('layouts.app')

@section('content')
@section('title', '| Front oldal')
    @section('css', '../css/front.css')

        <!--images like this: <a> <img> </a>-->

        <h1>Recipes:</h1>

        <body>
            <main>
                <div class="sort-container">
                    <!-- FILTERS -->
                    <div class="filter-container">
                        <label for="categoryFilter">Category:</label>
                        <select id="categoryFilter">
                            <option value="">All</option>
                            <option value="appetizer">Appetizer</option>
                            <option value="soup">Soup</option>
                            <option value="main dish">Main Dish</option>
                            <option value="side dish">Side Dish</option>
                            <option value="salad">Salad</option>
                            <option value="dessert">Dessert</option>
                            <option value="pastry">Pastry</option>
                            <option value="other">Other</option>
                        </select>

                        <label for="timeFilter">Prep Time:</label>
                        <select id="timeFilter">
                            <option value="">Any</option>
                            <option value="15">Under 15 min</option>
                            <option value="30">Under 30 min</option>
                            <option value="60">Under 1 hour</option>
                        </select>

                        <button id="sortToggle">Sort A-Z</button>
                    </div>


                </div>

                <script src="{{ asset('js/cardSorting.js') }}"></script>
                <div class="card-container">
                    @foreach ($dish as $d)
                                <div class="card" data-name="{{ strtolower($d->name) }}"
                                    data-category="{{ strtolower($d->category ?? '') }}" data-time="{{ $d->prep_time ?? 0 }}">


                                    <div><a href="{{ route('dish', $d->id) }}">{{ $d->name }}</a></div>
                                    @php
                                        $imgPath = public_path('dishimg/' . $d->img);
                                        $imgSrc = (isset($d->img) && File::exists($imgPath))
                                            ? asset('dishimg/' . $d->img)
                                            : asset('placeholder/dish.jpg');
                                    @endphp
                                    <img src="{{ $imgSrc }}" alt="{{ $d->name }}" class="recipe-image">
                                    <div class="card-body">
                                        <p>{{$d->desc ?? 'no desc available'}}</p>
                                    </div>
                                </div>

                    @endforeach
                </div>
    @endsection

            <script src="{{ asset('js/cardSorting.js') }}"></script>
            <div class="card-container">
                @foreach ($dish as $d)
                            <div class="card" data-name="{{ strtolower($d->name) }}"
                                data-category="{{ strtolower($d->category ?? '') }}" data-time="{{ $d->prep_time ?? 0 }}">

                                <div><a href="{{ route('dish', $d->id) }}">{{ $d->name }}</a></div>

                                @php
                                    $imgPath = public_path('dishimg/' . $d->img);
                                    $imgSrc = ($d->img && File::exists($imgPath))
                                        ? asset('dishimg/' . $d->img)
                                        : asset('placeholder/default.jpg');
                                @endphp

                                <img src="{{ $imgSrc }}" alt="{{ $d->name }}" class="recipe-image">

                                <div class="card-body">
                                    <p>{{ $d->desc ?? 'no desc available' }}</p>
                                </div>
                            </div>
                @endforeach
            </div>

        </main>

@endsection