<?php

use App\Controller\IndexController;
use Klein\Klein as Router;

$router = new Router();

$router->respond('GET', '/', function () {
    $ctr = new IndexController();
    return $ctr->index();
});

$router->respond('GET', '/usuario/[:id]?', function ($request, $response) {
    $ctr = new IndexController();
    return $response->json($ctr->usuario($request->id));
});

/** Tratamento de Erros */
$router->onHttpError(function ($code, $route) {
    $request = $route->request();

    switch ($code) {
        case 404 || 405:
            $body = <<<HTML
                    <h1>$code</h1>
                    <h3>Página não encontrada!</h3>
                    <p><a href="/">Voltar para Home</a></p>
                    HTML;
            break;
        default:
            $body = <<<HTML
                    <h1>$code</h1>
                    <h3>Comportamento inesperado da aplicação!</h3>
                    HTML;
    }

    $route->response()->body($body);
});

$router->dispatch();
