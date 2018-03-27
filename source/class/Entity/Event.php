<?php

namespace ImGrowth\Entity;

use Phi\Model\Entity;

class Event extends Entity
{

    protected $values = array(
        'id' => null,
        'node_id' => null,
        'name' => null,
        'creation_date' => null,
        'data' => null,
    );

    protected $node;

    protected $nodes = null;


    public function setNode(Node $node)
    {
        $this->node = $node;
        $this->setValue('node_id', $node->getId());
        return $this;
    }




    public function getId() {
        return $this->getValue('id');
    }



}