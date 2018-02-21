<?php

namespace ImGrowth\Repository;

use ImGrowth\Entity\Node as NodeEntity;
use ImGrowth\Repository;
use Phi\Model\Entity;


class Account extends Repository
{

    protected static $tableName = 'account';

    private static $loadedAccounts = array();


    public function initialize()
    {
        $query = "
            CREATE TABLE ".$this->getTableName()." (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              user_id varchar(15),
              version varchar(15),
              name varchar(255),
              ping_time datetime,
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


    public function getAccountById($id) {

        if(!isset(static::$loadedAccounts[$id])) {
            $query = "
            SELECT * FROM ".$this->getTableName()."
            WHERE
              id = :id
        ";

            $data = $this->queryAndFetchOne($query, array(
                ':id' => $id
            ));

            $account = new \ImGrowth\Entity\Account($this);
            $account->setValues($data);

            static::$loadedAccounts[$id] = $account;
        }

        return static::$loadedAccounts[$id];
    }




    public function store(Entity $node)
    {

        return $this;
    }



}