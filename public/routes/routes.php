<?php

use App\Domain\Model\{Color, Vehicles};
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

$render->htmlRender(Router::get('/vehicle/edit', 'template/edit.php', [
  'vehicle' => $vehicle->getVehicleById($_GET['vehicle_id'] ?? 0),
  'colors' => $color->getAllColors()
]));

Router::post('/newRegister');
Router::post('/editVehicle');

if (!in_array($currentRoute, Router::getAllRoutes())) 
  $render->htmlRenderNotFound();