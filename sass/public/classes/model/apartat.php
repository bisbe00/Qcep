<?php

class Apartat
{
    private $nom;
    private $icona;
    private $descripcio;
    private $link;

    public function __construct($nom, $icona, $descripcio, $link)
    {
        $this->nom = $nom;
        $this->icona = $icona;
        $this->descripcio = $descripcio;
        $this->link = $link;
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
    	return "Nom: {$this->nom}, Icona: {$this->icona}, Descripcio: {$this->descripcio}, Link: {$this->link}";
    }
}
