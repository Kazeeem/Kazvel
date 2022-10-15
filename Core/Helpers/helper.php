<?php

use Core\View;
use Core\Env;

if (!function_exists('view')) {
    /**
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    function view($view = null, $data = [], $mergeData = [])
    {
        echo View::render($view, $data, $mergeData);
    }
}

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $env = new Env();
        return $env->getEnv($key, $default);
    }
}

/**
 * Convert the string with hyphens to camelCase
 *
 * @param string $string The string to convert
 * @return string
 */
if (!function_exists('convertToCamelCase')) {
    function convertToCamelCase($string)
    {
        return lcfirst(convertToStudlyCaps($string));
    }
}

/**
 * Convert the string with hyphens to StudlyCaps,
 * e.g. post-authors => PostAuthors
 *
 * @param string $string The string to convert
 * @return string
 */
if (!function_exists('convertToStudlyCaps')) {
    function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
}