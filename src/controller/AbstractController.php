<?php
namespace App\Controller;
use Slim\App;
use Slim\Views\Twig;

abstract class AbstractController
{
    protected $view;
    protected $logger;
    protected $debugbar;

    public function setView(Twig $view)
    {
        $this->view = $view;
    }
}