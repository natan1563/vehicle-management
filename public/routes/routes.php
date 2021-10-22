<?php

use App\Infrastructure\Access\{Render, Router};

require_once __DIR__ . '/../../vendor/autoload.php';

$render = new Render;

$render->htmlRender(Router::get('/', 'template/registration.html'));
$render->htmlRender(Router::get('/register', 'template/registration.html'));