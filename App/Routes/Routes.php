<?php

namespace App\Routes;

class Routes
{
    private static $routes = array();

    public static function add($route, $function, $method)
    {
        self::$routes[] = [
            'route' => $route,
            'function' => $function,
            'method' => $method,
        ];
    }

    public static function get($route, $function)
    {
        $route = new Route($route, $function, Route::GET);
        self::$routes[] = $route;
    }

    public static function post($route, $function)
    {
        $route = new Route($route, $function, Route::POST);
        self::$routes[] = $route;
    }

    public static function put($route, $function)
    {
        $route = new Route($route, $function, Route::PUT);
        self::$routes[] = $route;
    }

    public static function run()
    {

        $parsed_url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $current_route = null;

        foreach (self::$routes as $route) {
            $route_string = $route->getRoute();
            $route_method = $route->getMethod();
            if (($route_string == $parsed_url) && ($method == $route_method)) {
                $current_route = $route;
            }
        }

        if ($current_route != null) :
            $function = $current_route->getFunction();
            $function->__invoke();
        else :
            http_response_code(404);
            echo "Error 404. Essa rota não foi encontrada";
        endif;
    }
}