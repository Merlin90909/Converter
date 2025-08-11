<?php

declare(strict_types=1);

require __DIR__ . '/../boot.php';

$route =  $_SERVER['PATH_INFO'] ?? '/';
//echo'<pre>';
//var_dump($_SERVER);
//exit;

$routes = (require __DIR__ . '/../config/routes.php');
if (isset($routes[$route])) {
    require $routes[$route];
} else {
    require __DIR__ . '/../scr/Seiten/404.php';
}
