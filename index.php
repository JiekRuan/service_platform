<?php
session_start();

$domain = $_SERVER['HTTP_HOST'];

use MyApp\Router as Router;

require_once 'src/router/router.php';


$router = new Router();
$router->dispatch();