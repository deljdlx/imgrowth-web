<?php

namespace ImGrowth\Configuration\Router;



use ImGrowth\Entity\Node;
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

        $application = $this->application;

        $router->get('getConfiguration', '`/server/getConfiguration`', function () {

            $data =array(
                "time" => time(),
                "date" => date('Y-m-d H:i'),
                "version" => "0.0.1",
                "humidity" => array(
                    0 => 2000,
                    1 => 2000,
                    2 => 2000,
                    3 => 2000
                )
            );
            header('Content-type: application/json');
            echo json_encode($data);
        });


        $router->get('server/initialize', '`/server/initialize`', function () use ($application) {

            $repository = $application->getContainer()->get('nodeRepository');
            $repository->reset();


            $repository = $application->getContainer()->get('nodeRecordRepository');
            $repository->reset();

            $data = array(
                'message' => 'System initialized'
            );

            header('Content-type: application/json');
            echo json_encode($data);
        });






        $router->post('node/register', '`/node/register`', function () use ($application) {

            $json= $this->request->post();

            $data=json_decode($json['data']);

            $rawData = json_encode($json, JSON_PRETTY_PRINT);


            $node = new Node();
            $node->setValue('data', $rawData);
            $node->setValue('ip', $data->meta->ip);
            $node->setValue('node_id', $data->meta->id);
            $node->setValue('mac', $data->meta->mac);
            $node->setValue('firmware', $data->meta->firmware);



            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $nodeRepository->store($node);

            //file_put_contents('dump.php', json_encode($data, JSON_PRETTY_PRINT));

            header('Content-type: application/json');
            echo json_encode($node);


            //die('EXIT '.__FILE__.'@'.__LINE__);
        });










        $router->get('node/calibrate', '`/node/calibrate0`', function () {
            $content = file_get_contents('http://192.168.0.15/node/getData');

            $data = json_decode($content);

            $averages = array();

            foreach ($data->humidities as $index => $entries) {
                $average=array_sum($entries) / count($entries);
                $sum = 0;
                $i = 0;

                foreach ($entries as $value) {
                    $delta = $value/$average;
                    if($delta<1.1 && $delta>0.9) {
                        $sum += $value;
                        $i++;
                    }
                }

                if($i) {
                    $filteredAverage = $sum/$i;
                    $averages[] = $filteredAverage;
                }
             }

             $node = new Node();
             $node->calibrateHumidity(0, $averages);


             die('EXIT '.__FILE__.'@'.__LINE__);


            header('Content-type: application/json');
            echo $content;

            /*
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
            */
        });



        $router->get('node/getConfiguration', '`/node/getConfiguration`', function () {

            $content = file_get_contents('http://192.168.0.15/node/getConfiguration');
            header('Content-type: application/json');
            echo $content;
        });


        return$router;
    }


}

