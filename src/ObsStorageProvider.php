<?php

namespace Kalax2\Laravel\Filesystem\Obs;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Kalax2\Flysystem\Obs\ObsAdapter;

class ObsStorageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        Storage::extend('obs', function (Application $app, array $config) {
            $adapter = new ObsAdapter(
                accessKey: $config['access_key'],
                accessSecret: $config['access_secret'],
                region: $config['region'],
                bucket: $config['bucket'],
                config: [
                    'ssl' =>  $config['ssl'],
                    'domain' => empty($config['domain']) ? null : $config['domain'],
                    'guzzle' => $config['guzzle']
                ]
            );

            return new FilesystemAdapter(new FileSystem($adapter), $adapter);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
