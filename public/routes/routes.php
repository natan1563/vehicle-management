<?php

use App\Domain\Model\Color;
use App\Infrastructure\Access\{Render, Router};

require_once __DIR__ . '/../../vendor/autoload.php';

$currentRoute = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI']);

$render = new Render;
$color  = new Color;
$allColors = $color->getAllColors(); 
$render->htmlRender(Router::get('/', 'template/registration.php'), ['colors' => $allColors]);
$render->htmlRender(Router::get('/register', 'template/registration.php', ['colors' => $allColors]));

if (!in_array($currentRoute, Router::getAllRoutes())) 
  $render->htmlRenderNotFound();

