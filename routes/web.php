<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Livewire\HomePage;
use App\Livewire\Articles\Index as ArticleIndex;
use App\Livewire\Articles\Show as ArticleShow;
use App\Models\Setting;

Route::get('/', HomePage::class)->name('home');


Route::get('/articles', ArticleIndex::class)->name('articles.index');
Route::get('/articles/{slug}', ArticleShow::class)->name('articles.show');

Route::get('/lihat-cv', function () {
    $path = Setting::get('cv_path');

    if (! $path || ! Storage::disk('public')->exists($path)) {
        abort(404, 'CV belum diunggah.');
    }

    return Storage::disk('public')->response($path, 'CV-Prihandana-Yoga-Kusuma.pdf');
})->name('cv.view');