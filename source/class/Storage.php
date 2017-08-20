<?php

namespace ImGrowth;

use ImGrowth\Entity\Node;
use ImGrowth\Storage\NodeRecord;
use Phi\Database\Source;

class Storage
{

    /**
     * @var Source
     */
    private $database;


    public function __construct($database)
    {
        $this->database = $database;

        $this->nodeStorage = new \ImGrowth\Storage\Node($database);
        $this->nodeRecordStorage = new NodeRecord($database);
    }


    public function initialize()
    {
        $this->nodeStorage->initialize();
        $this->nodeRecordStorage->initialize();
        return $this;
    }

    public function reset()
    {
        $this->nodeStorage->reset();
        $this->nodeRecordStorage->reset();
        return $this;
    }


    public function getAllNodes()
    {
        return $this->nodeStorage->getAll();
    }


    public function storeNode(Node $node)
    {
        $this->nodeStorage->store($node);
        return $this;
    }


    public function storeNodeRecord(\ImGrowth\Entity\NodeRecord $record)
    {
        $this->nodeRecordStorage->store($record);
    }


    public function nodeExists(Node $node)
    {
        return $this->nodeStorage->exists($node);
    }


}