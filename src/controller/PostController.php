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
	public function index(Request $request, Response $response)
	{
		$data['entries'] = Post::orderBy('created_at', 'desc')->get();
		$this->view->render($response,'archive_post.twig',$data);
	}

	public function show(Request $request, Response $response)
	{
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
		$this->setRequestParams($request);
		
		$post = new Post();
		$isSuccess = $post->create($this->requestParams);

		if ($isSuccess) {
			$this->flash->addMessage('Success', $isSuccess->title.'：Added Successfly!');
			return $response->withStatus(200)->withHeader('Location', '/post/'.$isSuccess->id);
		} else {
			$this->flash->addMessage('Error', 'Add failed!');
			return $response->withStatus(404);
		}

		return $response;
	}

	public function update(Request $request, Response $response){
		$this->setRequestParams($request);
		$isSuccess = Post::find($request->getAttribute('id'))->update($this->requestParams);

		if ($isSuccess) {
			$this->flash->addMessage('Success', 'Update Success!');
			return $response->withStatus(200)->withHeader('Location', '/post/'.$request->getAttribute('id'));
		} else {
			$this->flash->addMessage('Error', 'Update failed!');
			return $response->withStatus(404);
		}

		return $response;
	}

	public function destroy(Request $request, Response $response){
		$isSuccess = Post::destroy($request->getAttribute('id'));

		if ($isSuccess) {
			$this->flash->addMessage('Success', 'Delete Success!');
			return $response->withStatus(200)->withHeader('Location', '/post/');
		} else {
			$this->flash->addMessage('Error', 'Delete failed!');
			return $response->withStatus(404);
		}

		return $response;
	}
}
