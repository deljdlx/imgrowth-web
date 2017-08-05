<?php

namespace ImGrowth\Storage;

use ImGrowth\Node\Node as NodeEntity;
use Phi\Database\Source;

class NodeRecord
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


}