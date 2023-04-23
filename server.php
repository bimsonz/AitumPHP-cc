<?php

require_once 'vendor/autoload.php';

use FastRoute\RouteCollector;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
  $r->addRoute('GET', '/hc', 'Aitum\CustomCode\Controller\Core::heartbeat');
  $r->addRoute('POST', '/rules/{id}', 'Aitum\CustomCode\Controller\Action::trigger');
});

$server = new Server("127.0.0.1", 7252);

$server->on('request', function (Request $request, Response $response) use ($dispatcher) {
  $routeInfo = $dispatcher->dispatch($request->server['request_method'], $request->server['request_uri']);

  switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::FOUND:
      [$controller, $action] = explode('::', $routeInfo[1]);
      $controllerInstance = new $controller;
      $response->end($controllerInstance->$action($routeInfo[2], $request->getContent()));
      break;

    case FastRoute\Dispatcher::NOT_FOUND:
      $response->status(404);
      $response->end('Not Found');
      break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
      $response->status(405);
      $response->end('Method Not Allowed');
      break;

    default:
      $response->status(500);
      $response->end('Internal Server Error');
  }
});

$server->start();