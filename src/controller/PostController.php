<?php 
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\Model\Post;

class PostController extends AbstractController
{
	private $post;

	public function __construct(){
		
	}

	public function getByID(Request $request, Response $response)
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
		$data['entry'] = Post::find($request->getAttribute('id'));
		$this->view->render($response,'single_post.html',$data);

		return $response;
	}

	public function save(){

	}
}
