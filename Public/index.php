<?php
require '../vendor/autoload.php';
use App\Framework\Router;


// require '../src/Framework/Router.php';

$router = new Router();
$router->routeRequest();