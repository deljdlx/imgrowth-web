<?php

namespace ImGrowth\Configuration\Router;



use ImGrowth\WordpressOAuth;
use Phi\Application\Application;
use Phi\Routing\Interfaces\Router;
use Phi\Session\Session;

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
            $content = file_get_contents('http://192.168.0.15/node/water'.$index);
            echo $content;
        })->json();



        $router->get('node/lightOff', '`/node/lightOff`', function () use ($application) {
            $node = $application->get('nodeService');
            echo json_encode(
               $node->lightOff()
            );
        })->json();



        $router->get('node/lightOn', '`/node/lightOn`', function () use ($application) {
            $node = $application->get('nodeService');
            echo json_encode(
                $node->lightOn()
            );
        })->json();



        $router->get('node/getData', '`/node/getData`', function () use ($application) {
            $node = $application->get('nodeService');
            $content = json_encode($node->getData());
            echo $content;
        })->json();



        $router->get('node/getRecords', '`/node/(\d+)/getRecords`', function ($nodeId) use ($application) {
            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $node = $nodeRepository->getNodeById($nodeId);

            $records = $node->getRecords();

            $data = array(
                'light'=>array(),
                'temperature'=>array(),
                'humidity'=>array()
            );


            foreach ($records as $record) {

                $recordData = $record->getData();

                $data['light'][$record->getValue('date')] = $recordData->light;
                $data['temperature'][$record->getValue('date')] = $recordData->temperature;


                foreach ($recordData->humidity as $index => $humidity) {
                    if(!isset($data['humidity'][$index])) {
                        $data['humidity'][$index] = array();
                    }
                    $data['humidity'][$index][$record->getValue('date')] = $humidity;
                }
            }

            echo json_encode($data);


        })->json();





        $router->post('/server/registerdata', '`/server/registerdata`', function () use ($application) {


            $content = $this->request->post('data');

            $json = json_decode($content);

            $data = $json->data;
            $meta = $json->meta;

            $nodeRepository = $application->getContainer()->get('nodeRepository');
            $node = $nodeRepository->getNodeByMeta($meta);

            $record = $node->createRecord($data);
            $recordRepository = $application->getContainer()->get('nodeRecordRepository');
            $recordRepository->store($record);

            echo $content;
        })->json();





        $router->post('node/saveHumidityConfiguration', '`/node/saveHumidityConfiguration`', function () use ($application) {



        });

        return$router;
    }


}
