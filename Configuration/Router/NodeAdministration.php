<?php

namespace ImGrowth\Configuration\Router;



use Phi\Application\Application;
use Phi\Routing\Interfaces\Router;

class NodeAdministration
{

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }



    public function registerRoutes(Router$router) {


        $router->get('getConfiguration', '`/server/getConfiguration`', function () {

            $data =array(
                "time" => time(),
                "date" => date('Y-m-d H:i'),
                "version" => "0.0.1",
                "humidity" => array(
                    0 => 4000,
                    1 => 4000,
                    2 => 4000,
                    3 => 4000
                )
            );
            header('Content-type: application/json');
            echo json_encode($data);
        });





        $router->get('node/getConfiguration', '`/node/getConfiguration`', function () {

            $content = file_get_contents('http://192.168.0.15/node/getConfiguration');
            header('Content-type: application/json');
            echo $content;
        });


        return$router;
    }


}
