<?php

namespace App\Controllers;

class Posts extends BaseController
{
    /**
     * Show the index page
     * @return void
     */
    public function index()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>'.htmlspecialchars(print_r($_GET, true)).'</pre></p>';
    }

    /**
     * Show the add new page
     * @return void
     */
    public function addNew()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * @return void
     */
    public function edit()
    {
        echo 'Hello from the Edit action in the Posts controller!';
        echo '<p>Query string parameters: <pre>'.htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
    }
}