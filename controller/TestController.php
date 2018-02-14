<?php 
namespace Test\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;

class TestController
{
	protected $container;
	
	public function __construct(ContainerInterface $container){
		//service keys : vendor/slim/slim/Slim/Container.php
		//serviceprovider : vendor/slim/slim/Slim/DefaultServicesProvider.php
		$this->container = $container;
	}

	public function index(Request $request, Response $response)
	{
		$name = $request->getAttribute('name');
		//通常のreturn
		//$response->getBody()->write("Hello, $name");
		
		//jsonでreturn
		$response = $response->withJson(["response" => "Hello, $name"], 200);
		return $response;
	}
}
