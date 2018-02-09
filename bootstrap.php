<?php

require(__DIR__ . '/vendor/autoload.php');

define('APPLICATION_ROOT', __DIR__);

$autoloader=new \Elbiniou\Dashboard\Autoloader();
$autoloader->addNamespace('Elbiniou\Dashboard', __DIR__.'/vendor/elbiniou-dashboard/source/class');
$autoloader->register();



$application = new \Phi\Application\Application(__DIR__);


$dependencies = new \ImGrowth\Configuration\Container\Main($application);
$dependencies->inject();






//=======================================================






