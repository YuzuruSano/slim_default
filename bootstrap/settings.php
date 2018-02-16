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
            'template_path' => __DIR__ . '/../templates/',
            'options' => [
                'cache' => __DIR__ . '/../cache/'
            ]
        ],
    ]
];