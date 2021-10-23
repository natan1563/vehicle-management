<?php 

namespace App\Infrastructure\Access;

define("__VIEW__", __DIR__ . "/../../../resource/");

class Router
{
    protected static array $routes = [];

    public static function get(string $route, string $rawPathFile, array $params = []): array 
    {
        $pathFile =  __VIEW__ .  $rawPathFile;
        self::setNewRoute($route);
        return [
            'route'  => $route, 
            'path'   => str_replace('\\', DIRECTORY_SEPARATOR, $pathFile),
            'params' => $params,
        ];
    }

    public static function getAllRoutes(): array
    {
        return self::$routes;
    }

    private static function setNewRoute(String $routeName): void 
    {
        array_push(self::$routes, $routeName);
    }
}