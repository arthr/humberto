<?php
return [
    'connections' => [
        'default' => [
            'driver'    => 'mysql',
            'host'      => '192.168.2.217',
            'database'  => 'projetinho',
            'username'  => 'root',
            'password'  => '1234',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'lbc' => [
            'driver'    => 'mysql',
            'host'      => 'mysql642.umbler.com',
            'port'      => '41890',
            'database'  => 'lbc',
            'username'  => 'lbc',
            'password'  => 'LBC55465213',
            'charset'   => 'latin1',
            'collation' => 'latin1_swedish_ci',
            'prefix'    => '',
        ]
    ]
];
