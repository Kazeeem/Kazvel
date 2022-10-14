<?php

namespace App\Controllers;

use Core\Controller;

class PostController extends Controller
{
    /**
     * Show the index page
     * @return void
     */
    public function indexAction()
    {
        echo 'Hello from the index action in the Posts controller!';
        echo '<p>Query string parameters: <pre>'.htmlspecialchars(print_r($_GET, true)).'</pre></p>';
    }

    /**
     * Show the add new page
     * @return void
     */
    public function addNewAction()
    {
        echo 'Hello from the addNew action in the Posts controller!';
    }

    /**
     * @return void
     */
    public function editAction()
    {
        echo 'Hello from the Edit action in the Posts controller!';
        echo '<p>Query string parameters: <pre>'.htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
    }
}