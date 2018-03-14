<?php
require(__DIR__.'/bootstrap.php');






$router = new \Phi\Routing\Router();
$application->setRouter($router);



$nodeRouteConfiguration = new \ImGrowth\Configuration\Router\NodeAdministration($application);
$nodeRouteConfiguration->registerRoutes($router);


$newsRouteConfiguration = new \ImGrowth\Configuration\Router\News($application);
$newsRouteConfiguration->registerRoutes($router);




$defaultRouteConfiguration = new \ImGrowth\Configuration\Router\Main($application);
$defaultRouteConfiguration->registerRoutes($router);



$projectRouteConfiguration = new \ImGrowth\Component\Project\Router($application);

$router->addRouter($projectRouteConfiguration, 'project', '`/project`');


//$projectRouteConfiguration->registerRoutes($router, );


//=======================================================





$application->run();

echo $application->send();

