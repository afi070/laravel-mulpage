<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

Route::get('/', function () {
    $articles = Article::latest()->take(3)->get();
    return view('home', compact('articles'));
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('articles', ArticleController::class);