<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        config([
            'livewire.temporary_file_upload.disk' => 'public',
            'livewire.temporary_file_upload.directory' => 'livewire-tmp',
        ]);

        $directories = [
            storage_path('app/public/images/featureds'),
            storage_path('app/public/livewire-tmp'),
            storage_path('app/private'),
            storage_path('framework/cache/data'),
            storage_path('framework/sessions'),
            storage_path('framework/views'),
            storage_path('app/public'),
        ];

        foreach ($directories as $directory) {
            File::ensureDirectoryExists($directory, 0775);
        }
    }
}
