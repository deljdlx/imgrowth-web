<?php

namespace ImGrowth;


class Node
{


    protected $urlRoot;

    protected $lightOnURI = '/node/lightOn';
    protected $lightOffURI = '/node/lightOff';

    protected $dataURI = '/node/getData';



    public function __construct($urlRoot)
    {
        $this->urlRoot = $urlRoot;
    }


    public function lightOn()
    {
        $content = file_get_contents($this->urlRoot.$this->lightOnURI);
        return json_decode($content);
    }


    public function lightOff()
    {
        $content = file_get_contents($this->urlRoot.$this->lightOffURI);
        return json_decode($content);
    }

    public function getData()
    {
        $content = file_get_contents($this->urlRoot.$this->dataURI);
        return json_decode($content);
    }






}