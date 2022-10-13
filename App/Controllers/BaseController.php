<?php

namespace App\Controllers;

use Exception;

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

    /**\
     * @param $name
     * @param array $args
     * @throws Exception
     */
    public function __call($name, $args)
    {
        $method = $name.'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        }
        else {
            throw new Exception('Method '.$method.' not found in controller '.get_class($this));
        }
    }

    /**
     * Before action filter. It is called before an action method runs
     * This may be useful for things like authentications.
     * @return void
     */
    protected function before()
    {
    }

    /**
     * After action filter. It is called after an action method runs
     * @return void
     */
    protected function after()
    {
    }
}