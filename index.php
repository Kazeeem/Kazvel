<?php

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = __DIR__; // Get parent directory
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';
    if (is_readable($file)) {
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }
});

//require 'Core/Router.php';

$router = new Core\Router();

// Add routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);