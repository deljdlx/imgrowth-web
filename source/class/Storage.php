<?php

namespace ImGrowth;

use ImGrowth\Node\Node;

class Storage
{

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
              ping_time INTEGER,
              data TEXT
            )
        ";
        $this->database->query($query);
        return $this;
    }

    public function reset() {
        $this->database->query("DROP TABLE node");
        return $this;
    }


    public function getAllNodes() {

        $query="
          select
            id,
            ip,
            ping_time as lastPingTime
          from node
        ";


        $rows=$this->database->query($query)->fetchAll();
        $nodes=array();
        foreach ($rows as $values) {
            $node=new Node();
            $node->setValues($values);
            $nodes[]=$node;
        }

        return $nodes;
    }


    public function storeNode(Node $node) {

        if(!$this->nodeExists($node)) {
            $ip=$node->getValue('ip');

            $query="
                INSERT INTO node (
                  ip,
                  ping_time
                ) VALUES (
                  '".$ip."',
                  '".time()."'
                )
            ";
            $this->database->query($query);
            $node->setValue('id', $this->database->getLastInsertId());
        }
        else {

        }
        return $this;
    }

    public function nodeExists(Node $node) {
        $query="
            SELECT
              id
            FROM node
            WHERE ip=".$this->database->escape($node->getValue('ip'))."
        ";



        $values=$this->database->query($query)->fetchAssoc();


        if(!empty($values)) {
            $node->setValue('id', $values['id']);
            return true;
        }
        else {
            return false;
        }


    }


}