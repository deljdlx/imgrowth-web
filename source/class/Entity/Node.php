<?php

namespace ImGrowth\Entity;

class Node
{

    protected $values = array(
        'ip' => null,
        'name'=>null,
        'humidity' => null,
        'lastPingTime' => null
    );


    /*

    private $humidity;
    private $lastPingTime;
    */


    public function __construct()
    {

    }


    public function setValue($key, $value) {
        $this->values[$key]=$value;
        return $this;
    }

    public function getValue($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key];
        }
        else {
            return null;
        }
    }

    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }


}