<?php 
namespace App\Controller;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use App\Model\Post;
use Psr\Container\ContainerInterface;

class PostController extends AbstractController
{
	private $post;
	protected $view;

	public function index(Request $request, Response $response)
	{
		$data['entries'] = Post::orderBy('created_at', 'desc')->get();
		$this->view->render($response,'archive_post.twig',$data);
	}

	public function show(Request $request, Response $response)
	{
		//通常のreturn
		//$response->getBody()->write("Hello, $id");
		//
		//jsonでreturn
		//$response = $response->withJson(["response" => "Hello, $id"], 200);

		$data['entry'] = Post::findOrFail($request->getAttribute('id'));
		$this->view->render($response,'single_post.twig',$data);

		return $response;
	}

	public function create(Request $request, Response $response)
	{
		$this->view->render($response,'form_post.twig');

		return $response;
	}

	public function edit(Request $request, Response $response)
	{
		$data['entry'] = Post::findOrFail($request->getAttribute('id'));
		$this->view->render($response,'form_post.twig',$data);

		return $response;
	}

	public function store(Request $request, Response $response){
		$params = $request->getAttribute('params');
		$postParams = $params['post'];
		
		$post = new Post;
		$post->update($postParams);

		return $response;
	}

	public function update(Request $request, Response $response){
		$params = $request->getAttribute('params');
		$postParams = $params['post'];
		
		Post::find($params['post']['id'])->update($postParams);
		
		$this->container->get('flash')->addMessage('Test', 'This is a message');
		// $back = $request->get('back');
		// $this->app->redirect(isset($back) ? $back : '/post/', 303);
	}

	public function delete(Request $request, Response $response){
		$params = $request->getAttribute('params');
		$postParams = $params['post'];
		
		Post::destroy($postParams['id']);

		return $response->withRedirect($this->container->get('router')->pathFor('archive-post'));
	}
}
