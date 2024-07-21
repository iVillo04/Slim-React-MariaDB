<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require './config/Config.php';

//autoloader
function autoloader($class_name)
{
    foreach (Config::$dirs as $dir) {
        $file = __DIR__ . $dir . '/' . $class_name . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}
spl_autoload_register('autoloader');


$app = AppFactory::create();


$app->addBodyParsingMiddleware();

//CORS Middleware
$app->add(new CorsMiddleware());

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

//routes
$app->get('/status', "MainController:status");

$app->run();
