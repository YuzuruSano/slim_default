<?php
namespace App\Controller;
use Slim\App;
use Slim\Views\Twig;
use Slim\Http\Request;

abstract class AbstractController
{
    protected $view;
    protected $app;
    protected $flash;
    protected $request;
    protected $requestParams = array();

    public function __construct(App $app){
    	$this->app = $app;
    	$this->container = $this->app->getContainer();
        $this->flash = $this->container->get('flash');
    }
    
    public function setView(Twig $view)
    {
        $this->view = $view;
    }

    protected function setRequestParams(Request $request){
        $params = $request->getAttribute('params');
        if(count($params['post']) > 0){
            $this->requestParams = $params['post'];
        }elseif(count($params['get']) > 0){
            $this->requestParams = $params['get'];
        }
    }
}