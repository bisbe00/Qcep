<?php

class Apartat
{
    public $nom;
    public $icona;
    public $descripcio;
    public $link;

    public function __construct($nom, $icona, $descripcio, $link)
    {
        $this->nom = $nom;
        $this->icona = $icona;
        $this->descripcio = $descripcio;
        $this->link = $link;
    }
}

?>