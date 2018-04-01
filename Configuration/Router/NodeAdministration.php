<?php

namespace ImGrowth\Configuration\Router;



use ImGrowth\Entity\Event;
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
                //"postDataDelay" => 600000,
                "date" => date('Y-m-d H:i'),
                "version" => "0.0.1",
                "humidity" => array(
                    0 => 2000,
                    1 => 2000,
                    2 => 2000,
                    3 => 2000
                )
            );
            echo json_encode($data);
        })->json();


        $router->get('server/initialize', '`/server/initialize`', function () use ($application) {


            $repository = $application->getContainer()->get('accountRepository');
            $repository->reset();


            $repository = $application->getContainer()->get('nodeRepository');
            $repository->reset();


            $repository = $application->getContainer()->get('nodeRecordRepository');
            $repository->reset();

            $repository = $application->getContainer()->get('eventRepository');
            $repository->reset();


            $data = array(
                'message' => 'System initialized'
            );


            echo json_encode($data);
        })->json();






        $router->post('node/register', '`/node/register`', function () use ($application) {


            /**
             * @var \ImGrowth\Repository\Node $nodeRepository
             */
            /*
            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $node = $nodeRepository->getNodeById(4);

            $event = new Event(
                $application->getContainer()->get('eventRepository')
            );

            $event->setNode($node);
            $event->store();
            */

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


            $event = new Event(
                $application->getContainer()->get('eventRepository')
            );

            $event->setValue('name', 'start');

            $event->setNode($node);
            $event->store();

            echo json_encode($node);





        })->json();




        $router->post('node/ping', '`/node/ping`', function () use ($application) {
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


            echo json_encode($node);



        })->json();






        $router->get('nodes/lightOff', '`/nodes/lightOff`', function () use ($application) {
            /**
             * @var \ImGrowth\Repository\Node $nodeRepository
             */
            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $nodes = $nodeRepository->getAll();

            foreach ($nodes as $node) {
                if(
                    (time() - strtotime(-$node->getValue('ping_time'))) < 600
                ) {
                    $node->lightOff();
                }

            }
            echo json_encode($nodes);
        })->json();


        $router->get('nodes/lightOn', '`/nodes/lightOn`', function () use ($application) {
            /**
             * @var \ImGrowth\Repository\Node $nodeRepository
             */
            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $nodes = $nodeRepository->getAll();

            $nodesOn = [];

            foreach ($nodes as $node) {
                if(
                    (time() - strtotime($node->getValue('ping_time'))) < 600
                ) {
                    $node->lightOn();
                    $nodesOn[] = $node;
                }
            }
            echo json_encode($nodesOn);
        })->json();






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
            echo $content;
        })->json();


        return$router;
    }


}

