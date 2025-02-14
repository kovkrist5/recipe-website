<?php

use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/show', function(){
    return view('show');
});

Route::get('/dishes',[DishController::class, 'index']);
    
