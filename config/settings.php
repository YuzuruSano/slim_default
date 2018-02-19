<?php
return [
    'settings' => [
        'debug' => getenv('DEBUG'),
        // debug bar
        'debugbar' => [
            'storage' => [
                'enabled' => true,
                'path' => __DIR__. '/../logs/debug/',
            ],
        ],
        'view' => [
            'template_path' => __DIR__.'/../templates',
            'twig' => [
                'cache' => __DIR__.'/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]
];
