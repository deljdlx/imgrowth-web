<?php

namespace ImGrowth\Configuration\Container;


use Phi\Application\Application;
use Phi\Container\Container;

class Main extends Container
{


    public function __construct()
    {


        $this->set('database', function () {
            $fileName = 'sqlite:' . APPLICATION_ROOT . '/data/imgrowth.sqlite';
            $driver = new \Phi\Database\Driver\PDO\Source($fileName);

            $database = new \Phi\Database\Source($driver);

            return $database;
        });


        $this->set('nodeRepository', function () {

            return new \ImGrowth\Repository\Node(
                $this->get('database')
            );
        });

        $this->set('nodeRecordRepository', function () {
            return new \ImGrowth\Repository\NodeRecord(
                $this->get('database')
            );
        });

        $this->set('accountRepository', function () {
            return new \ImGrowth\Repository\Account(
                $this->get('database')
            );
        });

        $this->set('eventRepository', function () {
            return new \ImGrowth\Repository\Event(
                $this->get('database')
            );
        });







        $this->set('nodeService', function () {
            return new \ImGrowth\Node('http://192.168.0.15');
        });


        //=======================================================
        //=======================================================


        $this->set('session', function () {
            $session = new \Phi\Session\Session();
            return $session;
        });



        $this->set('node', function () {
            $node = new \ImGrowth\Entity\Node();
            $node->setStorage(
                $this->get('nodeRepository')
            );
            return $node;
        }, false);


        $this->set('nodeRecord', function () {
            $nodeRecord = new \ImGrowth\Entity\NodeRecord();
            $nodeRecord->setStorage(
                $this->get('nodeRepository')
            );
            return $nodeRecord;
        }, false);
    }




}

