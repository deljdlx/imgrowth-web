<?php

require(__DIR__ . '/vendor/autoload.php');


$application = new \Phi\Application\Application(__DIR__);

$application->getContainer()->set('storage', function() use($application) {
    $fileName = 'sqlite:' . __DIR__ . '/data/imgrowth.sqlite';
    $driver = new \Phi\Database\Driver\PDO\Source($fileName);
    $storage = new \ImGrowth\Storage($driver);
    return $storage;
});



$router = new \Phi\Routing\Router();
$application->setRouter($router);



$router->get('initialize', '`/initialize`', function () use($application) {

    $storage = $application->getContainer()->get('storage');
    $storage->initialize();

    return true;

});



$router->get('reset', '`/reset`', function () use($application) {

    $storage = $application->getContainer()->get('storage');

    $storage->reset();
    //$storage->initialize();

    return true;

});







$router->get('declare', '`/declare`', function () use($application) {


    $ip = $_SERVER['REMOTE_ADDR'];


    $storage = $application->getContainer()->get('storage');


    $node = new \ImGrowth\Entity\Node();
    $node->setValues(array(
        'ip' => $ip,
        'lastPingTime' => time()
    ));

    $storage->storeNode($node);

    print_r($node);
});



$router->get('getHumidity', '`/getHumidity`', function () use($application) {

    $storage = $application->getContainer()->get('storage');


    return true;

});



$application->run();

echo $application->getOutput();


