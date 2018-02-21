<?php

namespace ImGrowth\Configuration\Container;


use Phi\Application\Application;

class Main
{

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }


    public function inject()
    {

        $application = $this->application;

        $this->application->getContainer()->set('database', function () {
            $fileName = 'sqlite:' . APPLICATION_ROOT . '/data/imgrowth.sqlite';
            $driver = new \Phi\Database\Driver\PDO\Source($fileName);

            $database = new \Phi\Database\Source($driver);

            return $database;
        });


        $this->application->getContainer()->set('nodeRepository', function () use ($application) {

            return new \ImGrowth\Repository\Node(
                $application->getContainer()->get('database')
            );
        });

        $this->application->getContainer()->set('nodeRecordRepository', function () use ($application) {
            return new \ImGrowth\Repository\NodeRecord(
                $application->getContainer()->get('database')
            );
        });

        $this->application->getContainer()->set('accountRepository', function () use ($application) {
            return new \ImGrowth\Repository\Account(
                $application->getContainer()->get('database')
            );
        });









        $this->application->getContainer()->set('nodeService', function () use ($application) {
            return new \ImGrowth\Node('http://192.168.0.15');
        });




        $this->application->getContainer()->set('wordpressOAuth', function () {
            $server = new \ImGrowth\WordpressOAuth(array(
                'identifier' => 'W9MgWiN4LB5A',
                'secret' => 'NoZryXkABLP3yutEmTsf5yMzh9aUfrMD8j0xFJYR35rZryVD',
                'callback_uri' => "http://192.168.0.10/project/imgrowth-web/www/index.php/oauth/wordpress/callback",
            ));

            $server->setURLRoot('http://imgrowth.jlb.ninja/wp-json/wp/v2');

            return $server;
        });


        $this->application->getContainer()->set('session', function () {
            $session = new \Phi\Session\Session();
            return $session;
        });



        $this->application->getContainer()->set('node', function () use ($application) {
            $node = new \ImGrowth\Entity\Node();
            $node->setStorage(
                $application->getContainer()->get('nodeRepository')
            );
            return $node;
        }, false);


        $this->application->getContainer()->set('nodeRecord', function () use ($application) {
            $nodeRecord = new \ImGrowth\Entity\NodeRecord();
            $nodeRecord->setStorage(
                $application->getContainer()->get('nodeRepository')
            );
            return $nodeRecord;
        }, false);

    }


}

