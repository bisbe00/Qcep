<?php

class Proveidor
{
    private $proces_id;
    private $grupInteres_id;
    private $entrada;

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