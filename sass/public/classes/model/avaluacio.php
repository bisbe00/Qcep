<?php

class Avaluacio
{
    private $id;
    private $tipus;
    private $nivell;
    private $valoracio;
    private $planificacio;
    private $accions;
    private $estrategia;
    private $proces_id;

    public function __construct()
    {

    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new Exception("Attribute " . $name . " does not exist");
        }
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        } else {
            throw new Exception("Attribute " . $name . " does not exist");
        }
    }
}