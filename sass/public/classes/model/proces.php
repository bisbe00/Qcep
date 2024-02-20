<?php

class Proces
{
    public $nom;
    public $tipus;
    public $objectiu;
    public $usuari_email;

    public function __construct($nom, $tipus, $objectiu, $usuari_email)
    {
        $this->nom = $nom;
        $this->tipus = $tipus;
        $this->objectiu = $objectiu;
        $this->usuari_email = $usuari_email;
    }
}

?>