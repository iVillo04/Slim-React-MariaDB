<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;

class CorsMiddleware
{
    public function __invoke(Request $request, RequestHandlerInterface $handler): Response
    {
        $routeContext = RouteContext::fromRequest($request);
        $routingResults = $routeContext->getRoutingResults();
        $methods = $routingResults->getAllowedMethods();
        $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

        $response = $handler->handle($request);

        $response = $response->withHeader('Access-Control-Allow-Origin', Config::$cors_domain);
        $response = $response->withHeader('Access-Control-Allow-Methods', implode(',', $methods));
        $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
        $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

        // Options (pre-fly request)
        if ($request->getMethod() === 'OPTIONS') {
            return $response->withStatus(200);
        }

        return $response;
    }
}
