<?php

namespace App\Controllers;

use Core\View;

class Home extends BaseController
{

    public function indexAction()
    {
        $nexus = [
            'title' => 'Home Page - Welcome to Kazvel. Your awesome light weight framework for small projects'
        ];

        View::render('home.index', $nexus);
    }
}