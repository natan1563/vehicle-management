<?php

namespace App\Infrastructure\Access;

use Exception;

class Render
{
    public function htmlRender(array $router)
    {
        $currentRoute = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI']);
        
        if (count($router) && $currentRoute === $router['route']) {
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

    public function htmlRenderNotFound()
    {
        ob_start();
        include_once (__DIR__ . '/../../../resource/layout/main/error_404.html');
        echo ob_get_clean();
        return;
    }
}

