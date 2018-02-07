<?php

namespace ImGrowth\Repository;

use ImGrowth\Entity\Node as NodeEntity;
use ImGrowth\Repository;
use Phi\Model\Entity;


class Node extends Repository
{


    public function initialize()
    {
        $query = "
            CREATE TABLE node (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              
              node_id varchar(15),
              
              version varchar(15),
              firmware  varchar(15),
              mac varchar(64),
              ip varchar(15),
              
              name varchar(255),
              
              ping_time datetime,
              creation_date datetime,
              data_uri TEXT,
              data TEXT,
              calibration TEXT
              
            )
        ";
        $this->database->query($query);

        return $this;
    }

    public function getNodeByMeta($meta) {

        $query = "
            SELECT * FROM node
            WHERE
              node_id = :nodeId
        ";


        $data = $this->database->queryAndFetchOne($query, array(
            ':nodeId' => $meta->id
        ));

        $node = new \ImGrowth\Entity\Node();
        $node->setRepository($this);

        $node->setValues($data);

        return $node;
    }

    public function getNodeById($id) {
        $query = "
            SELECT * FROM node
            WHERE
              id = :nodeId
        ";

        $data = $this->database->queryAndFetchOne($query, array(
            ':nodeId' => $id
        ));

        $node = new \ImGrowth\Entity\Node();
        $node->setRepository($this);
        $node->setValues($data);

        return $node;
    }



    public function reset()
    {
        $this->database->query("DROP TABLE node");
        $this->initialize();
        return $this;
    }


    public function getAll()
    {

        $query = "
          select
            id,
            version,
            ip,
            name,
            ping_time,
            creation_date,
            data_uri,
            data
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


    public function store(Entity $node)
    {

        if (!$this->exists($node) || 1) {
            $ip = $node->getValue('ip');


            $mac = $node->getValue('mac');
            $nodeId = $node->getValue('node_id');

            $version = $node->getValue('version');
            $dataURI = $node->getValue('data_uri');
            $data = $node->getValue('data');
            $firmware = $node->getValue('firmware');

            $query = "
                INSERT INTO node (
                  node_id,
                  ip,
                  mac,
                  ping_time,
                  creation_date,
                  
                  version,
                  firmware,
                  
                  data,
                  
                  data_uri
                ) VALUES (
                  " . $this->database->escape($nodeId) . ",
                  " . $this->database->escape($ip) . ",
                  " . $this->database->escape($mac) . ",
                  " . $this->database->escape(date('Y-m-d H:i:s')) . ",
                  " . $this->database->escape(date('Y-m-d H:i:s')) . ",
                  
                  
                  " . $this->database->escape($version) . ",
                  " . $this->database->escape($firmware) . ",
                  
                  " . $this->database->escape($data) . ",
                  " . $this->database->escape($dataURI) . "
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