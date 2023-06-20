<?php
session_start();

use MyApp\Router as Router;

require_once 'src/router/router.php';


$router = new Router();
$router->dispatch();