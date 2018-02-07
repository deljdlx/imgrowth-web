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


            header('Content-type: application/json');
            echo json_encode($data);


        });





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

            header('Content-type: application/json');

            echo $content;
        });





        $router->post('node/saveHumidityConfiguration', '`/node/saveHumidityConfiguration`', function () use ($application) {



        });

        return$router;
    }


}
