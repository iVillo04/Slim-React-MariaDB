<?php

use Slim\Factory\AppFactory;
require_once __DIR__ . '/vendor/autoload.php';
require_once './config/Config.php';


//AUTOLOADER---------------
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
//END--AUTOLOADER----------


//APP----------------------
$app = AppFactory::create();

$app->addBodyParsingMiddleware();

//CORS Middleware
$app->add(new CorsMiddleware());

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);


//ROUTES-AUTOLOADER--------
foreach (Config::$routes as $route) {
    $file = __DIR__ . '/' . Config::$dirs[4] . '/' . $route . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
//END-ROUTES-AUTOLOADER----


$app->run();

//END--APP-----------------
