<?php

class Apartat
{
    private $id;
    private $nom;
    private $icona;
    private $descripcio;
    private $link;

    public function __construct($id, $nom, $icona, $descripcio, $link)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->icona = $icona;
        $this->descripcio = $descripcio;
        $this->link = $link;
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
