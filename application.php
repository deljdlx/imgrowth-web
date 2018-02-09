<?php
require(__DIR__.'/bootstrap.php');






$router = new \Phi\Routing\Router();
$application->setRouter($router);



$defaultRouteConfiguration = new \ImGrowth\Configuration\Router\Main($application);
$defaultRouteConfiguration->registerRoutes($router);


$nodeRouteConfiguration = new \ImGrowth\Configuration\Router\NodeAdministration($application);
$nodeRouteConfiguration->registerRoutes($router);


$newsRouteConfiguration = new \ImGrowth\Configuration\Router\News($application);
$newsRouteConfiguration->registerRoutes($router);


//=======================================================


$router->get('index', '`.*`', function () use ($application) {

    $layout =  new \ImGrowth\Layout\Dashboard\Main();
    echo $layout->render();
});

$router->get('content/graph', '`/content/graph`', function () use ($application) {
    $layout =  new \ImGrowth\Layout\Dashboard\Main();
    echo $layout->render();
});







$application->run();

echo $application->send();

