<?php

use App\Http\Controllers\AllergenController;
use App\Http\Controllers\DishController;
use Database\Seeders\AllergenSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

