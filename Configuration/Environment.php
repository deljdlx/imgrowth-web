<?php

namespace ImGrowth\Configuration;




class Environment
{

    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }


}
