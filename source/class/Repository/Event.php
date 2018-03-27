<?php

namespace ImGrowth\Repository;

use ImGrowth\Entity\Node as NodeEntity;
use ImGrowth\Repository;
use Phi\Model\Entity;


class Event extends Repository
{

    protected static $tableName = 'event';

    public function initialize()
    {
        $query = "
            CREATE TABLE ".$this->getTableName()." (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              node_id varchar(15),
              name  varchar(64),
              creation_date datetime,
              data TEXT
            )
        ";
        $this->database->query($query);

        return $this;
    }



    public function reset()
    {
        $this->database->query("DROP TABLE ".$this->getTableName()."");
        $this->initialize();
        return $this;
    }


    public function store(Entity $event)
    {
        $query = "
            INSERT INTO ".$this->getTableName()." (
              node_id,
              name,
              creation_date,
              data
            ) VALUES (
              :node_id,
              :name,
              :creation_date,
              :data
            )
        ";
        $this->database->query($query, array(
            ':node_id' => $event->getValue('node_id'),
            ':name' => $event->getValue('name'),
            ':creation_date' => date('Y-m-d H:i'),
            ':data' => $event->getValue('data'),
        ));

        $event->setValue('id', $this->database->getLastInsertId());
        return $this;
    }



}