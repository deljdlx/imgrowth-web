<?php

namespace ImGrowth\Configuration\Router;



use Phi\Application\Application;
use Phi\Routing\Interfaces\Router;

class Main
{

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }



    public function registerRoutes(Router$router) {

        $application = $this->application;


        $router->get('node/water', '`/node/water(\d)`', function ($index) use ($application) {
            header('Content-type: application/json');
            $content = file_get_contents('http://192.168.0.15/node/water'.$index);
            echo $content;
        });

        $router->get('node/lightOff', '`/node/lightOff`', function () use ($application) {
            header('Content-type: application/json');
            $content = file_get_contents('http://192.168.0.15/node/lightOff');
            echo $content;
        });

        $router->get('node/lightOn', '`/node/lightOn`', function () use ($application) {
            header('Content-type: application/json');
            $content = file_get_contents('http://192.168.0.15/node/lightOn');
            echo $content;
        });

        $router->get('node/getData', '`/node/getData`', function () use ($application) {
            header('Content-type: application/json');
            $content = file_get_contents('http://192.168.0.15/node/getData');
            echo $content;
        });


        $router->post('node/saveHumidityConfiguration', '`/node/saveHumidityConfiguration`', function () use ($application) {



        });

        return$router;
    }


}
