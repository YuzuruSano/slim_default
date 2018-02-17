<?php
/**
 * Init
 */
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/bootstrap.php';
require __DIR__ . '/src/middleware.php';

/**
 * Route
 */
require __DIR__ . '/routes.php';

/**
 * Controllers
 */
require __DIR__ . '/controller/Post.php';

$app->run(); 