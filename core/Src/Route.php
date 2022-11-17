<?php

namespace Src;

use Error;

class Route
{
    private static array $routes = [];

    private static string $prefix = '';

    public static function setPrefix(string $prefix): void
    {
        self::$prefix = $prefix;
    }

    public static function add(string $route, array $action): void
    {
        if (!array_key_exists($route, self::$routes)) {
            self::$routes[$route] = $action;
        }
    }

    public function start(): void
    {
        $path = explode('?', $_SERVER['REQUEST_URI'])[0];
        $path = str_replace(self::$prefix, '', $path);

        if (!array_key_exists($path, self::$routes)) {
            throw new Error('This path does not exist');
        }

        $class = self::$routes[$path][0];
        $action = self::$routes[$path][1];

        if (!class_exists($class)) {
            throw new Error('This class does not exist');
        }

        if (!method_exists($class, $action)) {
            throw new Error('This method does not exist');
        }

        call_user_func([new $class, $action]);
    }
}