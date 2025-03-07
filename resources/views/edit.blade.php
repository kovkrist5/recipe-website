<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/edit.css" type="text/css">
    <title>Edit Recipe</title>
</head>

<body>
    <!-- Header Section -->
    <header>
        <nav class="topnav">
            <div class="nav-links">
                <a class="active" href="/home">Home</a>
                <a href="/about">About</a>
                <a href="/services">Services</a>
                <a href="/create">Add new recipe</a>
                <a href="#contact">Contact</a>
            </div>
            <input type="text" class="search-box" placeholder="Search...">
        </nav>
    </header>
    <div class="container">
        <h1>Edit {{ $dish->name }}</h1>
        <form class="edit_align" action="{{ route('update', $dish->id) }}" method="post">
            <div>
                @method('PUT')
                <label for="name">Recipe Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $dish->name) }}">
                <br>
                <br>
                <label for="courseId">Select Type of Course:</label>

                <select name="courseId" id="courseId">
                    <option value="8">Other</option>
                </select>
                <button class="button_save" type="submit">Save</button>
            </div>
    </div>
</body>

</html>
