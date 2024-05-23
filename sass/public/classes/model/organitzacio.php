<?php

class Organitzacio
{
    private $id;
    private $nom;
    private $email;
    private $web;
    private $logo;

    public function __construct($id, $nom, $email, $web, $logo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->web = $web;
        $this->logo = $logo;
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
