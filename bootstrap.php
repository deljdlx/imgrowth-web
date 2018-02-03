<?php

require(__DIR__ . '/vendor/autoload.php');



$autoloader=new \Elbiniou\Dashboard\Autoloader();
$autoloader->addNamespace('Elbiniou\Dashboard', __DIR__.'/vendor/elbiniou-dashboard/source/class');
$autoloader->register();



$application = new \Phi\Application\Application(__DIR__);


$application->getContainer()->set('database', function () {
    $fileName = 'sqlite:' . __DIR__ . '/data/imgrowth.sqlite';
    $driver = new \Phi\Database\Driver\PDO\Source($fileName);
    return $driver;
});


$application->getContainer()->set('repository', function () use ($application) {
    $storage = new \ImGrowth\Repository(
        $application->getContainer()->get('database')
    );
    return $storage;
});



$application->getContainer()->set('nodeRepository', function () use ($application) {
    return new \ImGrowth\Repository\Node(
        $application->getContainer()->get('database')
    );
});

$application->getContainer()->set('nodeRecordRepository', function () use ($application) {
    return new \ImGrowth\Repository\NodeRecord(
        $application->getContainer()->get('database')
    );
});








//=======================================================
//test
$application->getContainer()->set('node', function () use ($application) {
    $node = new \ImGrowth\Entity\Node();
    $node->setStorage(
        $application->getContainer()->get('nodeRepository')
    );

    return $node;


}, false);

$application->getContainer()->set('nodeRecord', function () use ($application) {
    $nodeRecord = new \ImGrowth\Entity\NodeRecord();
    $nodeRecord->setStorage(
        $application->getContainer()->get('nodeRepository')
    );
    return $nodeRecord;
}, false);





