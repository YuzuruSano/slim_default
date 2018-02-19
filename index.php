<?php
/**
 * Init
 */

require __DIR__ . '/vendor/autoload.php';

/**
 * set environment settings
 */
$dot_env = __DIR__;
if (is_readable($dot_env)) {
    $dotenv = new Dotenv\Dotenv($dot_env);
    $dotenv->load();
}

/**
 * set App
 */
$settings = require(__DIR__.'/config/settings.php');

$di = new SlimAura\Container($settings['settings']);
$app = new \Slim\App($di);

require __DIR__ . '/config/dependencies.php';

/**
 * Route
 */
require __DIR__ . '/routes.php';

$app->run(); 