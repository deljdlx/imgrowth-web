<?php

namespace ImGrowth\Storage;

use ImGrowth\Entity\Node as NodeEntity;
use Phi\Database\Source;

class Node
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
            CREATE TABLE node (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              ip varchar(15),
              name varchar(255),
              ping_time datetime,
              data TEXT
            )
        ";
        $this->database->query($query);

        return $this;
    }

    public function reset()
    {
        $this->database->query("DROP TABLE node");
        return $this;
    }


    public function getAll()
    {

        $query = "
          select
            id,
            name,
            ip,
            ping_time as lastPingTime
          from node
        ";


        $rows = $this->database->query($query)->fetchAll();
        $nodes = array();
        foreach ($rows as $values) {
            $node = new NodeEntity();
            $node->setValues($values);
            $nodes[] = $node;
        }

        return $nodes;
    }


    public function store(NodeEntity $node)
    {

        if (!$this->exists($node)) {
            $ip = $node->getValue('ip');

            $query = "
                INSERT INTO node (
                  ip,
                  ping_time
                ) VALUES (
                  " . $this->database->escape($ip) . ",
                  " . $this->database->escape(date('Y-m-d H:i:s')) . "
                )
            ";
            $this->database->query($query);
            $node->setValue('id', $this->database->getLastInsertId());
        }
        else {
            $query = "
                UPDATE node SET 
                  ping_time =" . $this->database->escape(date('Y-m-d H:i:s')) . "
            ";

            print_r($query);

            $this->database->query($query);
        }
        return $this;
    }

    public function exists(NodeEntity $node)
    {
        $query = "
            SELECT
              id
            FROM node
            WHERE ip=" . $this->database->escape($node->getValue('ip')) . "
        ";


        $values = $this->database->query($query)->fetchAssoc();


        if (!empty($values)) {
            $node->setValue('id', $values['id']);
            return true;
        }
        else {
            return false;
        }


    }


}