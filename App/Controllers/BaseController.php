<?php

namespace App\Controllers;

abstract class BaseController
{
    /**
     * Parameters from the matched route
     * @var array $route_params
     */
    protected $route_params = [];

    /**
     * BaseController constructor.
     * @param array $route_params Parameters from the route
     * @return void
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }
}