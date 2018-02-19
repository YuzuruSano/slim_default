<?php
use Dopesong\Slim\Error\Whoops as WhoopsError;

$di = $app->getContainer();

/**
 * set Whoops
 */
// $container['phpErrorHandler'] = function($c) {
// 	return new WhoopsError($c->get('settings')['displayErrorDetails']);
// };
$di->set('phpErrorHandler', function () use ($di) {
	return new WhoopsError($di->get('settings')['displayErrorDetails']);
});

/**
 * set Twig
 */
$di->set('view', function () use ($di) {
	$settings = $di->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($di->get('router'), $di->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
});

/**
 * set Debugbar
 */
// $settings = $container->get('settings')['debugbar'];
// $provider = new Kitchenu\Debugbar\ServiceProvider($settings);
// $provider->register($app);
// 
$di->set('callableResolver', new App\CallableResolver($di));

$di->setters['App\Controller\AbstractController']['setView'] = $di->lazyGet('view');

/**
 * set Eloquant
 */
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($di->get('settings')['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
