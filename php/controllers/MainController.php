<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MainController
{
  public function status(Request $request, Response $response, $args)
  {
    $view = new MustacheView();
    $view->setData(["status" => "online"]);
    $response->getBody()->write($view->render('status','.json'));
    return $response->withHeader("Content-type", "application/json")->withStatus(200);
  }
}
