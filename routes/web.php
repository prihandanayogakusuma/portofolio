<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\Articles\Index as ArticleIndex;
use App\Livewire\Articles\Show as ArticleShow;

Route::get('/', HomePage::class)->name('home');


Route::get('/articles', ArticleIndex::class)->name('articles.index');
Route::get('/articles/{slug}', ArticleShow::class)->name('articles.show');

Route::get('/download-cv', function () {
    $path = public_path('cv/cv-prihandana.pdf');
    return response()->download($path);
})->name('cv.download');