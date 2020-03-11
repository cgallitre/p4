<?php
session_start();

require '../vendor/autoload.php';
use App\Framework\Router;

$router = new Router();
$router->routeRequest();