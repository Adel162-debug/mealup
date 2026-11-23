<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::view('/pantry', 'pantry')->name('pantry.index');
Route::view('/recipes', 'recipe')->name('recipes.index');
Route::view('/saved', 'recipe')->name('saved.index');