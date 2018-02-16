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


//結局Laravelっぽくする...
$app->get('/test/{name}', \Test\Controller\TestController::class . ':index');
$app->get('/post/{id:[0-9]+}', \Post\Controller\PostController::class . ':getPost');