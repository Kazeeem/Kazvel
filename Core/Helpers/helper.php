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

if (!function_exists('errorView')) {
    /**
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    function errorView($view = null, $data = [], $mergeData = [])
    {
        return View::render($view, $data, $mergeData);
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

/**
 * Generate the URL to the application asset.
 *
 * @param  string  $path
 * @return string
 */
if (!function_exists('asset_url')) {
    function asset_url($path)
    {
        if (isValidUrl($path)) {
            return $path;
        }

        $site_base_url = baseUrl();
        $asset_folder = env('ASSET_FOLDER', 'assets');

        // Once we get the root URL, we will check to see if it contains an index.php
        // file in the paths. If it does, we will remove it since it is not needed
        // for asset paths, but only for routes to endpoints in the application.

        return removeIndex($site_base_url) . '/'.$asset_folder . '/' . trim($path, '/');
    }
}

/**
 * @return string
 */
if (!function_exists('baseUrl')) {
    function baseUrl()
    {
        return env('SITE_URL', 'http://localhost');
    }
}

/**
 * Determine if the given path is a valid URL.
 *
 * @param  string  $path
 * @return bool
 */
if (!function_exists('isValidUrl')) {
    function isValidUrl($path)
    {
        if (! preg_match('~^(#|//|https?://|(mailto|tel|sms):)~', $path)) {
            return filter_var($path, FILTER_VALIDATE_URL) !== false;
        }

        return true;
    }
}

/**
 * Remove the index.php file from a path.
 *
 * @param  string  $root
 * @return string
 */
if (!function_exists('removeIndex')) {
    function removeIndex($root)
    {
        $i = 'index.php';

        return str_contains($root, $i) ? str_replace('/' . $i, '', $root) : $root;
    }
}

/**
 * Get the URL for the request.
 *
 * @param  string  $url
 * @return string
 */
if (!function_exists('url')) {
    function url($url)
    {
        $url = ltrim($url, '/');
        return baseUrl().'/'.$url;
    }
}