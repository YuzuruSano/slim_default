<?php 
namespace Post\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;

class PostController
{
	protected $container;
	protected $debugber;
	
	public function __construct(ContainerInterface $container){
		//service keys : vendor/slim/slim/Slim/Container.php
		//serviceprovider : vendor/slim/slim/Slim/DefaultServicesProvider.php
		$this->container = $container;
		$this->debugber = $this->container->get('debugbar');
	}

	public function getPost(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		//通常のreturn
		$response->getBody()->write("Hello, $id");
		//debugbar
		$this->debugber->warning('Error!');
		$this->debugber->notice('notice!');
		//jsonでreturn
		//$response = $response->withJson(["response" => "Hello, $id"], 200);
		return $response;
	}
}
