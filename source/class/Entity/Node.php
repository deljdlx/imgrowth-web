<?php

namespace ImGrowth\Entity;

use Phi\Model\Entity;

class Node extends Entity
{

    protected $values = array(
        'ip' => null,
        'version' => null,
        'name' => null,
        'ping_time' => null,
        'data_uri' => null,
    );


    public function getId() {
        return $this->getValue('id');
    }


    public function getData()
    {
        $dataURL='http://'.$this->getValue('ip').$this->getValue('data_uri');
        $data = json_decode(file_get_contents($dataURL), true);
        return $data;
    }




}