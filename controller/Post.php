<?php 
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

class Post
{
	protected $container;
	protected $debugber;
	protected $view;
	protected $table;
	
	public function __construct(ContainerInterface $container){
		//service keys : vendor/slim/slim/Slim/Container.php
		//serviceprovider : vendor/slim/slim/Slim/DefaultServicesProvider.php
		$this->container = $container;
		$this->debugber = $this->container->get('debugbar');
		$this->view = $this->container->get('view');
		$this->table = $this->container->get('db')->table('posts');
	}

	public function getEntry(Request $request, Response $response)
	{
		//通常のreturn
		//$response->getBody()->write("Hello, $id");
		//
		//debugbar
		//$this->debugber->warning('Error!');
		//$this->debugber->notice('notice!');
		//
		//jsonでreturn
		//$response = $response->withJson(["response" => "Hello, $id"], 200);
		//
		$data['entry'] = $this->table->where('id', '=', $request->getAttribute('id'))->get();
		$this->rendar($response,$data,'single_post.html');
	}

	public function rendar($response,$data,$template){
		return $this->view->render($response, $template, $data);
	}
}
