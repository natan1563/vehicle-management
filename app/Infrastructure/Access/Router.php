<?php 

namespace App\Infrastructure\Access;

define("__VIEW__", __DIR__ . "/../../../resource/");

abstract class Router
{
    public static function get(string $route, string $rawPathFile, array $params = []): array 
    {
        $pathFile =  __VIEW__ .  $rawPathFile;

        return [
            'route'  => $route, 
            'path'   => str_replace('\\', DIRECTORY_SEPARATOR, $pathFile),
            'params' => $params,
        ];
    }
}