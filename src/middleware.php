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
 * set Twig
 */
$container['view'] = function ($c) {
	$settings = $c->get('settings')['view'];
	$view = new \Slim\Views\Twig(
		$settings['template_path'],
		$settings['options']
	);
	$view->addExtension(new \Slim\Views\TwigExtension(
		$c['router'],
		$c['request']->getUri()
	));
	return $view;
};

/**
 * set Debugbar
 */
$settings = $container->get('settings')['debugbar'];
$provider = new Kitchenu\Debugbar\ServiceProvider($settings);
$provider->register($app);