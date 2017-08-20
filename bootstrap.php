<?php

require(__DIR__ . '/vendor/autoload.php');


$application = new \Phi\Application\Application(__DIR__);


$application->getContainer()->set('database', function () {
    $fileName = 'sqlite:' . __DIR__ . '/data/imgrowth.sqlite';
    $driver = new \Phi\Database\Driver\PDO\Source($fileName);
    return $driver;
});

$application->getContainer()->set('storage', function () use ($application) {
    $storage = new \ImGrowth\Storage($application->getContainer()->get('database'));
    return $storage;
});

$application->getContainer()->set('node', function () use ($application) {
    $node = new \ImGrowth\Entity\Node();
    $node->setStorage(
        new \ImGrowth\Storage\Node($application->getContainer()->get('database'))
    );

    return $node;


}, false);

$application->getContainer()->set('nodeRecord', function () use ($application) {
    $nodeRecord = new \ImGrowth\Entity\NodeRecord();
    $nodeRecord->setStorage(
        new \ImGrowth\Storage\NodeRecord($application->getContainer()->get('database'))
    );
    return $nodeRecord;
}, false);





