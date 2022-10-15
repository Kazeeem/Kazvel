<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $post = new Post();
        $posts = $post->getAll();
        $nexus = [
            'title' => 'Home Page - Welcome to Kazvel. Your awesome light weight framework for small projects'
        ];

        return view('home.index', compact('posts', 'nexus'));
    }
}