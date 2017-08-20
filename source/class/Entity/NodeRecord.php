<?php

namespace ImGrowth\Entity;

use Phi\Model\Entity;

class NodeRecord extends Entity
{

    /**
     * @var Node
     */
    protected $node;


    protected $values = array(
        'id'=>null,
        'node_id'=>null,
        'date'=>null,
        'data'=>null

    );


    /**
     * @param Node $node
     * @return $this
     */
    public function setNode(Node $node) {
        $this->node=$node;
        $this->setValue('node_id', $node->getId());
        return $this;
    }



}