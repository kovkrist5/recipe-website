<?php

use App\Http\Controllers\AllergenController;
use Database\Seeders\AllergenSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/allergens', [AllergenSeeder::class, 'index']);
