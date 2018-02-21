<?php

namespace ImGrowth\Entity;

use Phi\Model\Entity;

class Account extends Entity
{

    protected $values = array(
        'ip' => null,
        'version' => null,
        'firmware' => null,
        'mac' => null,

        'creation_date' => null,
        'data' => null,
        'calibration' => null,

        'ping_time' => null,

        'data_uri' => null,
    );

    protected $nodes = null;


    public function getId() {
        return $this->getValue('id');
    }


    public function getNodes()
    {

        if($this->nodes === null) {
            $nodeRepository = new \ImGrowth\Repository\Node($this->getRepository()->getSource());
            $this->nodes = $nodeRepository->getNodesByAccountId($this->getValue('id'));
        }


        return $this->nodes;
    }





}