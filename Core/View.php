<?php

namespace Core;

use Exception;

class View
{
    /**
     * @param string $view The view file
     * @param array $data
     * @throws Exception
     * @return void
     */
    public static function render($view, $data = [])
    {
        $view = str_replace('.', '/', $view); // Replace the dots with a forward slash.
        $view = $view.'.razor.php';

        $file = dirname(__DIR__).'/Razors/Views/'.$view;

        if (is_readable($file)) {
            extract($data, EXTR_SKIP); // This handles the $data passed to the view.
            require $file;
        }
        else {
            throw new Exception('View '.$file.' not found');
        }
    }
}