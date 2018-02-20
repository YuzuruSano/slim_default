<?php 
namespace App\Middleware;

class requestParameterToObjectMiddleware
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        $params = [];
        $params['get'] = $request->getQueryParams();
        $params['post'] = $request->getParsedBody();

        // 連想配列をオブジェクトに変換して，'params'というkeyに登録
        $request = $request->withAttribute('params', $params);

        $response = $next($request, $response);
        
        return $response;
    }
}