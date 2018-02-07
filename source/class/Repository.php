<?php

namespace ImGrowth;

use ImGrowth\Entity\Node;
use ImGrowth\Repository\NodeRecord;
use Phi\Database\Source;

abstract class Repository extends \Phi\Model\Repository
{


    public function initialize()
    {
        $this->nodeRepository->initialize();
        $this->nodeRecordRepository->initialize();
        return $this;
    }

    public function reset()
    {
        $this->nodeRepository->reset();
        $this->nodeRecordRepository->reset();
        return $this;
    }


    public function getAllNodes()
    {
        return $this->nodeRepository->getAll();
    }


    public function storeNode(Node $node)
    {
        $this->nodeRepository->store($node);
        return $this;
    }


    public function storeNodeRecord(\ImGrowth\Entity\NodeRecord $record)
    {
        $this->nodeRecordRepository->store($record);
    }


    public function nodeExists(Node $node)
    {
        return $this->nodeRepository->exists($node);
    }


}