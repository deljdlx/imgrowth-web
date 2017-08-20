<?php
require(__DIR__.'/bootstrap.php');






$router = new \Phi\Routing\Router();
$application->setRouter($router);


$router->get('initialize', '`/initialize`', function () use ($application) {
    $storage = $application->getContainer()->get('storage');
    $storage->initialize();
    return true;
});


$router->get('reset', '`/reset`', function () use ($application) {
    $storage = $application->getContainer()->get('storage');
    $storage->reset();
    return true;

});


$router->get('declare', '`/declare`', function () use ($application) {


    $ip = $_SERVER['REMOTE_ADDR'];
    $nodeDataURI = $_GET['dataURI'];
    $nodeVersion = $_GET['nodeVersion'];


    $storage = $application->getContainer()->get('storage');


    $node = new \ImGrowth\Entity\Node();
    $node->setValues(array(
        'ip' => $ip,
        'ping_time' => date('Y-m-d H:i:s'),
        'data_uri' => $nodeDataURI,
        'version' => $nodeVersion,
    ));

    $storage->storeNode($node);

    print_r($node);
});


$router->get('node/data', '`/node/data`', function () use ($application) {


});


$router->get('getNodeData', '`/getNodeData`', function () use ($application) {

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


$application->run();

echo $application->getOutput();

