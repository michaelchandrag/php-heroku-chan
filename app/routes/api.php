<?php
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/hello', 'ApiHelloController:HelloAction');
    $group->get('/panggil/{nama}', 'ApiHelloController:PanggilAction');
    $group->get('/products', 'ApiHelloController:GetProductsAction');

    $group->post('/product', 'ApiHelloController:CreateProductAction');
});