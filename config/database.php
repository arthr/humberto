<?php
return [
    'connections' => [
        'default' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD'),
            'charset'   => env('DB_CHARSET', 'utf8'),
            'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
            'prefix'    => env('DB_PREFIX'),
        ],
        'lbc' => [
            'driver'    => 'mysql',
            'host'      => 'mysql642.umbler.com:41890',
            'database'  => 'lineagebc',
            'username'  => 'lbc',
            'password'  => 'LBC55465213',
            'charset'   => 'latin1',
            'collation' => 'latin1_swedish_ci',
            'prefix'    => '',
        ]
    ]
];
