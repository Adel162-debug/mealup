<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', function () {
    return view('home');
});

Route::view('/pantry', 'pantry')->name('pantry.index');

Route::view('/recipes', 'recipe')->name('recipes.index');

Route::view('/saved', 'recipe')->name('saved.index');
