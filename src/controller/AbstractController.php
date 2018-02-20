<?php
namespace App\Controller;
use Slim\App;
use Slim\Views\Twig;

abstract class AbstractController
{
    protected $view;
    protected $app;

    public function __construct(App $app){
    	$this->app = $app;
    	$this->container = $this->app->getContainer();
    }
    public function setView(Twig $view)
    {
        $this->view = $view;
    }
}