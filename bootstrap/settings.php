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
    ]
];