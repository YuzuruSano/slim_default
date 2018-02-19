<?php
return [
    'settings' => [
        'debug' => getenv('DEBUG'),
        // debug bar
        'debugbar' => [
            'enabled' => true,
            'storage' => [
                'enabled' => true,
                'path' => __DIR__. '/../logs/debug/',
            ],
            'capture_ajax' => true,
            'collectors' => [
                'phpinfo'    => true,  // Php version
                'messages'   => true,  // Messages
                'time'       => true,  // Time Datalogger
                'memory'     => true,  // Memory usage
                'exceptions' => true,  // Exception displayer
                'route'      => true,
                'request'    => true,  // Request logger
            ]
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
