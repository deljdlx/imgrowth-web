<?php

namespace ImGrowth\Repository;


use Phi\Database\Source;
use Phi\Model\Entity;


class NodeRecord extends \ImGrowth\Repository
{


    protected static $tableName = 'node_record';

    public function initialize()
    {
        $query = "
            CREATE TABLE ".$this->getTableName()." (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              node_id INTEGER, 
              date datetime,
              data TEXT
            )
        ";
        $this->database->query($query);


        return $this;
    }


    public function getRecordsByNodeId($nodeId)
    {
        $query = "
            SELECT * FROM ".$this->getTableName()."
            WHERE
              node_id = :nodeId
            ORDER BY date
        ";

        $values = $this->database->queryAndFetch($query, array(
            ':nodeId' => $nodeId
        ));

        $records =array();

        foreach ($values as $data) {
            $record = new \ImGrowth\Entity\NodeRecord($this);
            $record->setValues($data);
            $records[] = $record;
        }

        return $records;


    }

    public function reset()
    {
        $this->database->query("DROP TABLE ".$this->getTableName()."");
        $this->initialize();
        return $this;
    }

    public function store(Entity $record)
    {
        $query = "
            INSERT INTO ".$this->getTableName()." (
              node_id,
              date,
              data
            ) VALUES (
              " . $this->database->escape($record->getValue('node_id')) . ",
              " . $this->database->escape(date('Y-m-d H:i:s')) . ",
              " . $this->database->escape($record->getValue('data')) . "
            )
        ";
        $this->database->query($query);
        $record->setValue('id', $this->database->getLastInsertId());
        return $this;
    }


}