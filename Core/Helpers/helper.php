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