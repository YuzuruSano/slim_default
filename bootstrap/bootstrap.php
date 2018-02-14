<?php
/**
 * set app
 * @var [type]
 */
$config = require(__DIR__.'/settings.php');
$app = new \Slim\App($config);

/**
 * set environment settings
 */
$dot_env = __DIR__. '/../.env';
if (is_readable($dot_env)) {
	$dotenv = new Dotenv\Dotenv(__DIR__. '/../');
	$dotenv->load();
}