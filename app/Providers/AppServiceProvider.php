<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Livewire menyimpan file upload sementara ke disk ini sebelum dipindah
        // ke disk final (lihat config/filesystems.php "media"). Tanpa ini, defaultnya
        // ikut filesystems.default ("local") yang read-only di container production.
        config(['livewire.temporary_file_upload.disk' => config('filesystems.media')]);
    }
}
