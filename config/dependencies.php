<?php
use Dopesong\Slim\Error\Whoops as WhoopsError;
use Kitchenu\Debugbar\Middleware\Debugbar;
use Kitchenu\Debugbar\SlimDebugBar;
use Kitchenu\Debugbar\Controllers\AssetController;
use DebugBar\OpenHandler;

$di = $app->getContainer();

/**
 * set Whoops
 */
$di->set('phpErrorHandler', function () use ($di) {
	return new WhoopsError($di->get('settings')['displayErrorDetails']);
});
/**
 * set debubbar
 */
$di->set('debugbar', function () use ($di) {
    return new SlimDebugBar($di, $di->get('settings')['debugbar']);
});

$di->set('debugbarAssets', function () use ($di) {
    return new AssetController($di);
});
/**
 * set flush
 */
$di->set('flash', function () use ($di) {
    return new \Slim\Flash\Messages();
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
    $view->addExtension(new Knlv\Slim\Views\TwigMessages(
    	new Slim\Flash\Messages()
	));
    return $view;
});

/**
 * override callableResolver
 */
$di->set('callableResolver', new App\CallableResolver($di));

/**
 * injection
 */
$di->params['App\Controller\AbstractController']['app'] = $app;
$di->setters['App\Controller\AbstractController']['setView'] = $di->lazyGet('view');

/**
 * fix Debugbar root
 */
$app->group('/_debugbar', function() {
	$this->get('/open',function($request, $response,$args){

		$openHandler = new OpenHandler($this->get('debugbar'));

        $data = $openHandler->handle(null, false, false);

        $body = $response->getBody();
        $body->rewind();
        $body->write($data);

        // Ensure that the json encoding passed successfully
        if ($data === false) {
            throw new RuntimeException(json_last_error_msg(), json_last_error());
        }

        return $response->withHeader('Content-Type', 'application/json;charset=utf-8');
	})->setName('debugbar-openhandler');

	$this->get('/assets/stylesheets',function($request, $response,$args){
		
		$renderer = $this->get('debugbar')->getJavascriptRenderer();
		$body = $response->getBody();
		$body->rewind();
		$body->write($renderer->dumpAssetsToString('css'));

		return $response->withHeader('Content-type', 'text/css');
	})->setName('debugbar-assets-css');

	$this->get('/assets/javascript', function($request, $response,$args){
		$renderer = $this->get('debugbar')->getJavascriptRenderer();

		$body = $response->getBody();
		$body->rewind();
		$body->write($renderer->dumpAssetsToString('js'));

		return $response->withHeader('Content-type', 'text/javascript');
	})->setName('debugbar-assets-js');
});

$app->add(new Debugbar($di->get('debugbar'), $di->get('errorHandler')));

/**
 * set Eloquant
 */
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($di->get('settings')['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();