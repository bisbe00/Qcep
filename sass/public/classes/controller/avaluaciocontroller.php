<?php

class AvaluacioController extends Controlador
{


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $avaluacio = new Avaluacio();
            $avaluacio->__set('id', $this->sanitize($_POST['id']));
            $avaluacio->__set('tipus', $this->sanitize($_POST['tipus']));
            $avaluacio->__set('nivell', $this->sanitize($_POST['nivell']));
            $avaluacio->__set('valoracio', $this->sanitize($_POST['valoracio']));
            $avaluacio->__set('planificacio', $this->sanitize($_POST['planificacio']));
            $avaluacio->__set('accions', $this->sanitize($_POST['accions']));
            $avaluacio->__set('estrategia', $this->sanitize($_POST['estrategia']));
            $avaluacio->__set('proces_id', $this->sanitize($_POST['proces_id']));

            $avaluacioModel = new AvaluacioModel();
            $state = $avaluacioModel->create($avaluacio);
            if($state){
                header("Location: ?document/documents&proces=".$_POST['proces_id']);
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $avaluacioModel = new AvaluacioModel();
            $state = $avaluacioModel->deleteByID($_POST['id']);

            if($state){
                header("Location: ?document/documents&proces=".$_POST['proces_id']);
            }
        }
    }
}