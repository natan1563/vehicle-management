<?php 

namespace App\Infrastructure\Access;

use App\Domain\Model\Vehicles;

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

    public static function post(string $route, array $params = []) 
    {
        $endPoint = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];

        if ($endPoint !== $route)
            return;

        if(count($params) > 0)
            extract($params);
        
        switch ($route) {
            case '/newRegister':
              $code  = (new Vehicles)->vehicleRegistration($_POST) ? 201 : 409;
              http_response_code($code);
              return json_encode([
                 'msg' => 'Veículo registrado com sucesso!' 
              ]);
            break;
        }
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