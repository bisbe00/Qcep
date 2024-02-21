<?php

class Proces
{
    private $nom;
    private $tipus;
    private $objectiu;
    private $usuari_email;

    public function __construct($nom, $tipus, $objectiu, $usuari_email)
    {
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->objectiu = $objectiu;
        $this->usuari_email = $usuari_email;
    }

    public function __get($name){
        if(property_exists($this, $name)){
            return $this->$name;
        }else{
            throw new Exception("Attribute ".$name." does not exist");
        }
    }

    public function __set($name, $value){
        if(property_exists($this, $name)){
            return $this->$name = $value;
        }else{
            throw new Exception("Attribute ".$name." does not exist");
        }
    }

    /**
     * @return string
     */
    public function __toString() {
    	return "Nom: {$this->nom}, Tipus: {$this->tipus}, Objectiu: {$this->objectiu}, Usuari_email: {$this->usuari_email}";
    }
}
