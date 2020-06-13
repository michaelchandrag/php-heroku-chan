<?php
require_once __DIR__.'/api.php';
require_once __DIR__.'/web.php';


$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// www.asd.com/api/mllkkllklk
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/api/{routes:.+}', function ($request, $response) {
    $data = [
    	"success" => false,
    	"error" => 404,
    	"message" => "Route not found."
    ];
    $payload = json_encode($data);
	$response->getBody()->write($payload);
	return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
});
/**
 * Catch-all route to serve a 404 Not Found page if none of the routes match
 * NOTE: make sure this route is defined last
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});