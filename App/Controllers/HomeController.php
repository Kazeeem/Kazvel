<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{

    public function indexAction()
    {
        $nexus = [
            'title' => 'Home Page - Welcome to Kazvel. Your awesome light weight framework for small projects'
        ];

        return view('home.index', $nexus);
    }
}