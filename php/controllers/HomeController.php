<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
  public function home(Request $request, Response $response, $args)
  {
    $view = new MustacheView();
    $view->setData([
      "body" => [
        "data-bs-theme" => "dark"
      ],
      "card" => [
        "class" => " m-3 w-25",
        "p" => "Proprio un bel gatto",
        "title" => "Questo è un gatto",
      ],
      "button" => [
        "class" => "btn-success",
        "text" => "Scarica"
      ]
    ]);
    $response->getBody()->write($view->render('index'));
    return $response->withStatus(200);
  }
}
