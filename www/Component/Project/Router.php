<?php

namespace ImGrowth\Component\Project;


use Phi\Application\Application;
use \Phi\Routing\Router as PhiRouter;


class Router extends PhiRouter
{
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;



        /*
        $this->get('create', '`/create`', function () use ($application) {
                echo 'yolo';
        })->json();
        */

    }



}

