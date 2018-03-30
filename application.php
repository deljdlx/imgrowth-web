<?php
require(__DIR__.'/bootstrap.php');



$application = new \Phi\Application\Application(__DIR__);


$container = new \ImGrowth\Configuration\Container\Main();



//=======================================================
//=======================================================

$container->set('wordpress', function () {
    return new \ImGrowth\Configuration\Container\WordpressProduction();
});


$application->setContainer($container);




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
/*
$_SERVER= array (
    'REQUEST_METHOD' => 'GET',
    'REQUEST_URI' => '/project/imgrowth-web/www/content/wp-json/wp/v2/posts',
);
include(__DIR__.'/www/content/index.php');
*/



$application->run();

echo $application->send();

