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

Route::get('/debug-auth', function () {
    $user = \Illuminate\Support\Facades\Auth::guard('web')->user();
    return response()->json([
        'app_env' => config('app.env'),
        'user_logged_in_web_guard' => $user ? $user->email : null,
        'user_class' => $user ? get_class($user) : null,
        'implements_filament_user' => $user ? ($user instanceof \Filament\Models\Contracts\FilamentUser) : null,
        'can_access_panel' => ($user && $user instanceof \Filament\Models\Contracts\FilamentUser)
            ? $user->canAccessPanel(\Filament\Facades\Filament::getPanel('admin'))
            : null,
        'filament_auth_check' => \Filament\Facades\Filament::auth()->check(),
        'filament_auth_user' => optional(\Filament\Facades\Filament::auth()->user())->email,
    ]);
});

Route::get('/lihat-cv', function () {
    $path = Setting::get('cv_path');
    $disk = Storage::disk(config('filesystems.media'));

    if (! $path || ! $disk->exists($path)) {
        abort(404, 'CV belum diunggah.');
    }

    return $disk->response($path, 'CV-Prihandana-Yoga-Kusuma.pdf');
})->name('cv.view');