<?php

namespace ImGrowth\Storage;

use ImGrowth\Node\Node as NodeEntity;
use Phi\Database\Source;
use Phi\Model\Entity;
use Phi\Model\Interfaces\Storage;

class NodeRecord implements Storage
{

    /**
     * @var Source
     */
    private $database;


    public function __construct($database)
    {
        $this->database = $database;
    }

    public function initialize()
    {
        $query = "
            CREATE TABLE node_record (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              node_id INTEGER, 
              date datetime,
              data TEXT
            )
        ";
        $this->database->query($query);


        return $this;
    }

    public function reset()
    {
        $this->database->query("DROP TABLE node_record");
        return $this;
    }

    public function store(Entity $record)
    {
        $query = "
            INSERT INTO node_record (
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