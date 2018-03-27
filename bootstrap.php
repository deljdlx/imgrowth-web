<?php

require(__DIR__ . '/vendor/autoload.php');

define('APPLICATION_ROOT', __DIR__);

$autoloader=new \Elbiniou\Dashboard\Autoloader();
$autoloader->addNamespace('Elbiniou\Dashboard', __DIR__.'/vendor/elbiniou-dashboard/source/class');
$autoloader->register();

$autoloader=new \Phi\Core\Autoloader();
$autoloader->addNamespace('ImGrowth\Component', __DIR__.'/www/Component');
$autoloader->register();









//=======================================================






