<?php

/**
 * Autoload all files and classes
 */
require_once __DIR__.'/vendor/autoload.php';

$router = new Core\Router();

// Add routes
$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('posts', ['controller' => 'PostController', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);