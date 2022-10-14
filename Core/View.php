<?php

namespace Core;

use FiftyOnRed\Blade\Blade;

class View
{
    /**
     * @param string $view The view file
     * @param array $data
     * @param array $merge_data
     *
     */
    public static function render($view, $data = [], $merge_data = [])
    {
        $views = dirname(__DIR__) . '/Razors';
        $cache = dirname(__DIR__) . '/Core/Cache';

        //extract($data, EXTR_SKIP); // This handles the $data passed to the view.

        $blade = new Blade($views, $cache);
        return $blade->view()->make($view, $data, $merge_data);
    }
}