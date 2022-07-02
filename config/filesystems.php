<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'logo' => [
            'driver' => 'local',
            'root' => base_path('') . '/assets/admin/images/logo/',
            'url' => env('APP_URL').'/public',
            'visibility' => 'public',
        ],
        'doctor' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/doctor/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'admin' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/admin/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'hosbital' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/hosbital/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'fhosbital' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/fhosbital/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'clinic' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/clinic/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'venpharmice' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/venpharmice/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'venlabe' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/venlabe/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],



        'department' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/department/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        'sike' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/sike/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],
        'user' => [
            'driver' => 'local',
            'root' => public_path() . '/assets/images/user/',
            'url' => env('APP_URL') . '/public',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

];
