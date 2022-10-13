<?php

namespace Core;

/**
 * Router
 */
class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected array $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected array $params = [];

    /**
     * Add a route to the routing table
     * @param string $route The route URL
     * @param array $params Parameters (Controller, action, etc)
     *
     * @return void
     */
    public function add(string $route, array $params = [])
    {
        // Convert the routes to a regular expression, escape the forward slashes.
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g  {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters and case sensitive flag
        $route = '/^'.$route.'$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all routes from the routing table
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the params property if a route is found.
     * @param string $url The route URL
     * @return boolean true if a match is found, otherwise false
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Dispatch the route, creating the controller object and running the action method
     * @param string $url The route URL
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = "App\Controllers\\$controller";

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                }
                else {
                    echo "Method $action (in controller $controller) not found";
                }
            }
            else {
                echo "Controller class $controller not found";
            }
        }
        else {
            echo 'No route matched.';
        }
    }

    /**
     * Convert the string with hyphens to StudlyCaps,
     * e.g. post-authors => PostAuthors
     *
     * @param string $string The string to convert
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.g. add-new => addNew
     *
     * @param string $string The string to convert
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * @param $url
     * @return mixed|string
     */
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            //if (str_contains($parts[0], '=')) {
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            else {
                $url = '';
            }
        }

        return $url;
    }
}