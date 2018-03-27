<?php

namespace ImGrowth\Configuration\Router;



use ImGrowth\Entity\Event;
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



    public function registerRoutes(Router $router) {


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







        $router->get('content/graph', '`/content/graph`', function () use ($application) {
            $layout =  new \ImGrowth\Layout\Dashboard\Main();
            $layout->setActivePanel('graph');
            echo $layout->render();
        });

        $router->get('content/photo', '`/content/photo`', function () use ($application) {
            $layout =  new \ImGrowth\Layout\Dashboard\Main();
            $layout->setActivePanel('photo');
            echo $layout->render();
        });

        $router->get('content/action', '`/content/action`', function () use ($application) {
            $layout =  new \ImGrowth\Layout\Dashboard\Main();
            $layout->setActivePanel('action');
            echo $layout->render();
        });

        $router->get('content/configuration', '`/content/configuration`', function () use ($application) {
            $layout =  new \ImGrowth\Layout\Dashboard\Main();
            $layout->setActivePanel('configuration');
            echo $layout->render();
        });


        $router->get('index', '`.*`', function () use ($application) {

            /*
            $event = new Event(
                $application->getContainer()->get('eventRepository')
            );
            $event->setValue('name', 'test');
            $event->store();
            die('EXIT '.__FILE__.'@'.__LINE__);
            //*/

            /*
             *
             *
             */

            /*
            $repository = $application->getContainer()->get('eventRepository');
            $repository->initialize();
            die('EXIT '.__FILE__.'@'.__LINE__);
            */


            /*
            $repository = $application->getContainer()->get('nodeRepository');
            $nodes = $repository->getNodesByAccountId(1);
            */

            /*
            echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
            echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
            print_r($nodes);
            echo '</pre>';
            */

            /*
            foreach ($nodes as $node) {
                echo '<pre id="' . __FILE__ . '-' . __LINE__ . '" style="border: solid 1px rgb(255,0,0); background-color:rgb(255,255,255)">';
                echo '<div style="background-color:rgba(100,100,100,1); color: rgba(255,255,255,1)">' . __FILE__ . '@' . __LINE__ . '</div>';
                print_r($node->getAccount());
                echo '</pre>';
            }
            */


            //die('EXIT '.__FILE__.'@'.__LINE__);



            $layout =  new \ImGrowth\Layout\Dashboard\Main();
            echo $layout->render();
        });


        return$router;
    }


}
