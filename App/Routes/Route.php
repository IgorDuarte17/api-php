<?php

namespace App\Routes;

class Route
{
    const POST = 'POST';
    const GET = 'GET';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    private $route;
    private $function;
    private $method;


    public function __construct($route, $function, $method)
    {
        $this->route = $route;
        $this->function = $function;
        $this->method = $method;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function getMethod()
    {
        return $this->method;
    }
}