<?php
use Dopesong\Slim\Error\Whoops as WhoopsError;

$container = $app->getContainer();

/**
 * set Whoops
 */
$container['phpErrorHandler'] = function($c) {
	return new WhoopsError($c->get('settings')['displayErrorDetails']);
};

/**
 * set Debugbar
 */
$settings = $container->get('settings')['debugbar'];
$provider = new Kitchenu\Debugbar\ServiceProvider($settings);
$provider->register($app);