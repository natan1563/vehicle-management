<?php

use App\Domain\Model\Color;
use App\Domain\Model\Vehicles;
use App\Infrastructure\Access\{Render, Router};

require_once __DIR__ . '/../../vendor/autoload.php';

$currentRoute = (isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI']);

$render = new Render;
$color  = new Color;
$vehicle = new Vehicles;

$render->htmlRender(Router::get('/', 'template/list_vehicles.php', [
  'vehicles' => $vehicle->getAllVehicles()
]));

$render->htmlRender(Router::get('/register', 'template/registration.php', [
  'colors' => $color->getAllColors()
]));

Router::post('/newRegister');

if (!in_array($currentRoute, Router::getAllRoutes())) 
  $render->htmlRenderNotFound();