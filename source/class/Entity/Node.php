<?php

namespace ImGrowth\Entity;

use Phi\Model\Entity;

class Node extends Entity
{

    protected $values = array(

        'account_id' => null,

        'ip' => null,
        'version' => null,
        'firmware' => null,
        'mac' => null,

        'creation_date' => null,
        'data' => null,
        'calibration' => null,

        'ping_time' => null,

        'data_uri' => null,
    );


    protected $account = null;


    public function getId() {
        return $this->getValue('id');
    }


    public function calibrateHumidity($index, $values) {


    }

    public function getRecords()
    {

        $recordRepository = new \ImGrowth\Repository\NodeRecord($this->getRepository()->getSource());
        $records = $recordRepository->getRecordsByNodeId($this->getValue('id'));

        return $records;
    }


    public function getData()
    {
        $dataURL='http://'.$this->getValue('ip').$this->getValue('data_uri');
        $data = json_decode(file_get_contents($dataURL), true);
        return $data;
    }

    public function createRecord($recordData)
    {
        $record = new NodeRecord();
        $record->setValue('node_id', $this->getValue('id'));
        $record->setValue('data', json_encode($recordData, JSON_PRETTY_PRINT));
        return $record;
    }


    public function getAccount()
    {
        if($this->account === null) {
            $repository = new \ImGrowth\Repository\Account($this->getRepository()->getSource());
            $this->account = $repository->getAccountById($this->getValue('account_id'));
        }
        return $this->account;
    }




}