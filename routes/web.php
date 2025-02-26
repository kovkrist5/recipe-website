<?php

use App\Http\Controllers\DishController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/front', function () {
    return view('front');
});
Route::get('/create', function () {
    return view('create');
});
Route::post('/dish', [DishController::class, 'store'])->name("dish");
route::get('/show', [DishController::class, 'index']);


    
