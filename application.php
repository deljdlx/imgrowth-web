<?php
require(__DIR__.'/bootstrap.php');






$router = new \Phi\Routing\Router();
$application->setRouter($router);



$defaultRouteConfiguration = new \ImGrowth\Configuration\Router\Main($application);
$defaultRouteConfiguration->registerRoutes($router);


$nodeRouteConfiguration = new \ImGrowth\Configuration\Router\NodeAdministration($application);
$nodeRouteConfiguration->registerRoutes($router);


//=======================================================





/*
$router->get('node/getData', '`/getNodeData`', function () use ($application) {

    $storage = $application->getContainer()->get('storage');
    $nodes = $storage->getAllNodes();
    $nodesData = array();


    foreach ($nodes as $node) {
        $data = $node->getData();

        $nodeRecord=$application->getContainer()->get('nodeRecord');

        $nodesData[] = array(
            'node' => $node,
            'data' => $data
        );

        $nodeRecord->setValue('data', json_encode($data));
        $nodeRecord->setNode($node);
        $nodeRecord->store();
    }


    echo json_encode($nodesData);


    return true;
});
*/




//=======================================================








$router->get('index', '`.*`', function () use ($application) {
    include(__DIR__.'/template/dashboard.php');
});





$application->run();

echo $application->getOutput();

