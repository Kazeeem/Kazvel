<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function indexAction()
    {
        $nexus = [
            'title' => 'Home Page - Welcome to Kazvel. Your awesome light weight framework for small projects'
        ];

        return view('home.index', $nexus);
    }
}