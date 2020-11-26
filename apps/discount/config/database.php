<?php

return [
    'default'     => env('DB_CONNECTION', 'sqlite'),

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => env('DB_DATABASE', storage_path('database.sqlite')),
            'prefix'   => env('DB_PREFIX', ''),
        ],

    ],

    'fetch'       => PDO::FETCH_CLASS, // Returns DB objects in an array format.
    'migrations'  => 'migrations',
];
