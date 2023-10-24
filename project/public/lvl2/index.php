<?php

use Exceptions\DbException;

function myAutoLoader(string $className): void
{

    require_once str_replace('\\', '/', $className) . '.php';
}

try {
    spl_autoload_register('myAutoLoader');

    $route = $_GET['route'] ?? '';
    $routes = require('routes.php');

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            unset($matches[0]);

            $controllerName = $controllerAndAction[0];
            $actionName = $controllerAndAction[1];

            $controller = new $controllerName();
            $controller->$actionName(...$matches);
            break;
        }
    }

    if (!$isRouteFound) {
        throw new Exceptions\NotFoundException();
    }
} catch (Exceptions\DbException $e) {
    $view = new View\View(__DIR__ . '/templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (Exceptions\NotFoundException $e) {
    $view = new \View\View(__DIR__ . '/templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
}