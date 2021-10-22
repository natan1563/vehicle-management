<?php

namespace App\Infrastructure\Access;

use Exception;

class Render
{
    public function htmlRender(array $router)
    {
        $controlRoute = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI']);

        if ($controlRoute === $router['route']) {
            try {
                if (!file_exists($router['path']))
                    throw new \Exception('Arquivo inexistente', 500);

                if (count($router['params']) > 0)
                    extract($router['params']);

                ob_start();
                require_once($router['path']);

                echo ob_get_clean();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

