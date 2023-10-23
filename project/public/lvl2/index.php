<?php

function myAutoLoader(string $className)
{
    require_once __DIR__ . '/'  . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('myAutoLoader');

$author = new Models\User\User('Иван');
$article = new Models\Articles\Article('Заголовок', 'Текст', $author);


/*
if(!empty($_GET['name']))
{
    $controller->sayHello($_GET['name']);
}
else
{
    $controller->main();
}
*/

echo '<br>';


$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/routes.php';



$pattern = '~^hello/(.*)$~';
preg_match($pattern, $route, $matches);

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction)
{
    preg_match($pattern, $route, $matches);
    
    if(!empty($matches))
    {
        $isRouteFound = true;
        break;
    }
}

if(!$isRouteFound)
{
    echo 'Страница не найдена';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
