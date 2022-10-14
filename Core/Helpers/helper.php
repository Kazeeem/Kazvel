<?php

use Core\View;

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
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        //return Env::get($key, $default);
    }
}