<?php
require '../vendor/autoload.php';
use App\Framework\Router;

$router = new Router();
$router->routeRequest();