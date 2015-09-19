<?php

preg_match( '|([a-z0-9]+)://([^:]*)(:(.*))?@([A-Za-z0-9\.-]*)(:([0-9]*))?(/([0-9a-zA-Z_/\.-]*))|',
    $_ENV['DATABASE_URL'], $matches);

return [
    'debug' => true,
    'database' =>
        [
            'driver' => 'mysql',
            'host' => $matches[5],
            'database' => $matches[9],
            'username' => $matches[2],
            'password' => $matches[4],
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false
        ],
    'url' => $_ENV['SITE_URL'],
    'paths' =>
        [
            'api' => 'api',
            'admin' => 'admin',
        ],
];