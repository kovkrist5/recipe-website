<?php

use App\Http\Controllers\DishController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('create');
});
Route::post('/store', [DishController::class, 'store'])->name("store");
Route::get('/update/{id}', [DishController::class, 'update'])->name("update");
route::get('/front', [DishController::class, 'index']);
route::get('/dish/{id}', [DishController::class, 'show'])->name("dish");
route::get('dish/edit/{id}', [DishController::class, 'edit'])->name("dish/edit");
route::get('dish/delete/{id}', [DishController::class, 'destroy'])->name("dish/delete");




