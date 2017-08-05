<?php

require(__DIR__ . '/vendor/autoload.php');


$application = new \Phi\Application\Application(__DIR__);

$router = new \Phi\Routing\Router();
$application->setRouter($router);


$router->get('declare', '`/declare`', function () {


    $ip = $_SERVER['REMOTE_ADDR'];

    $fileName = 'sqlite:' . __DIR__ . '/data/imgrowth.sqlite';


    $driver = new \Phi\Database\Driver\PDO\Source($fileName);
    $storage = new \ImGrowth\Storage($driver);

    //$storage->reset();
    //$storage->initialize();

    //$nodes = $storage->getAllNodes();


    $node = new \ImGrowth\Node\Node();
    $node->setValues(array(
        'ip' => $ip,
        'lastPingTime' => time()
    ));

    $storage->storeNode($node);

    print_r($node);


});

$application->run();

echo $application->getOutput();


