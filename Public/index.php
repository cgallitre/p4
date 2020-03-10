<?php
session_start();
$_SESSION['message'] = null;

require '../vendor/autoload.php';
use App\Framework\Router;

$router = new Router();
$router->routeRequest();