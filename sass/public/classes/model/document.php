<?php

class Document
{
    private $id;
    private $nom;
    private $tipus;
    private $link;
    private $proces_nom;

    public function __construct($id,$nom, $tipus, $link, $proces_nom)
    {        
        $this->id = $id;
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->link = $link;
        $this->proces_nom = $proces_nom;
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
    	return "Nom: {$this->nom}, Tipus: {$this->tipus}, Link: {$this->link}, Proces_nom: {$this->proces_nom}";
    }
}
