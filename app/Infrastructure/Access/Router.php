<?php 

namespace App\Infrastructure\Access;

use App\Domain\Model\Vehicles;

define("__VIEW__", __DIR__ . "/../../../resource/");

class Router
{
    protected static array $routes = [];

    public static function get(string $route, string $rawPathFile, array $params = []): array 
    {
        self::setNewRoute($route);
        $endPoint = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];
        
        $pathFile =  __VIEW__ .  $rawPathFile;
        $dataRoute = [
            'route'  => $route, 
            'path'   => str_replace('\\', DIRECTORY_SEPARATOR, $pathFile),
            'params' => $params,
        ];
        return ($endPoint === $route) ? $dataRoute : [];
    }

    public static function post(string $route, array $params = []) 
    {
        self::setNewRoute($route);
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

            case '/editVehicle': 
                $code  = (new Vehicles)->vehicleUpdate($_POST) ? 204 : 409;
                http_response_code($code);
                return json_encode([
                    'msg' => 'Veículo atualizado com sucesso!' 
                ]);

            case '/remove':
                $code  = (new Vehicles)->vehicleRemove($_POST['id'] ?? 0) ? 200 : 409;
                http_response_code($code);
                return json_encode([
                    'msg' => 'Veículo removido com sucesso!' 
                ]);

            default: 
                    http_response_code(500);
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