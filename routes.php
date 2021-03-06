<?php 
//基本のget
$app->get('/hello/{name}', function ($request, $response , $args) {
	return $this->view->render($response, 'hello.html', [
		'name' => $args['name']
	]);
});

//正規表現
$app->get('/article/{id:[0-9]+}', function ($request, $response, $args) {
	// 処理を書く
	echo $args['id'];
});

//グループ化
// API group
// GET    /api/library/books/:id
// PUT    /api/library/books/:id
// DELETE /api/library/books/:id
$app->group('/api', function () use ($app) {

	// Library group
	$app->group('/library', function () use ($app) {

		// Get book with ID
		$app->get('/books/:id', function ($id) {
  
		});

		// Update book with ID
		$app->put('/books/:id', function ($id) {

		});

		// Delete book with ID
		$app->delete('/books/:id', function ($id) {

		});

	});
});

/**
 * Restful Routing
 */
$app->group('/post',function() use ($app){
	$app->get('/','\App\Controller\PostController:index')->setName('archive-post');

	$app->get('/create','\App\Controller\PostController:create');

	$app->post('/','\App\Controller\PostController:store');

	$app->get('/{id:[0-9]+}','\App\Controller\PostController:show')->setName('single-post');

	$app->get('/{id:[0-9]+}/edit','\App\Controller\PostController:edit');

	$app->put('/{id:[0-9]+}','\App\Controller\PostController:update');

	$app->delete('/{id:[0-9]+}','\App\Controller\PostController:destroy');
});