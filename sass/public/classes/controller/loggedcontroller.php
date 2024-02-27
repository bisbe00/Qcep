<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
class LoggedController
{

    public function connected()
    {

        $organitzacio = new Organitzacio(2,'Thos i Codina',null,null,null);
        $organitzacioModel = new OrganitzacioModel();
        $organitzacions = $organitzacioModel->read($organitzacio);
        $header = $this->generateHeader($organitzacions);


        $procesModel = new ProcesModel();
        $procesos = $procesModel->getTable();
        $main = $this->generateMain($procesos);
       
        $apartats = [];
        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        $footer = $this->generateFooter($apartats);

        LoggedView::show($header,$main,$footer);
    }

    public function generateHeader($organitzacions){
        $html = "";
        foreach($organitzacions as $organitzacio){
            $html .= "
            <div class=\"inc\">
                <a href=\"".$organitzacio->__get('web')."\"><img class=\"logo\" src=\"".$organitzacio->__get('logo')."\" alt=\"".$organitzacio->__get('nom')."\"/></a>
                <h2>".$organitzacio->__get('nom')."</h2>
            </div>
            <button class=\"logOut\"><a href=\"?home/show\">Log Out</a></button>";
        }
        return $html;
    }

    public function generateMain($procesos){
        $html = "<div class=\"cards\">";

        foreach ($procesos as $proces) {
            $html .= "<div class=\"card\">
            <h2><a href='?doc/documents&proces=".$proces->__get('nom')."'>{".$proces->__get('nom')."}</a>: ".$proces->__get('objectiu')."</h2>
            </div>";
        }

        $html .= "</div>";

        return $html;
    }

    public function generateFooter($apartats)
    {
        $html = '';
        foreach ($apartats as $apartat) {
            $html = $html . "
            <div>
                <a href=\"" . $apartat->__get('link') . "\" target=\"_blank\"><img src=\"" . $apartat->__get('icona') . "\" alt=\"" . $apartat->__get('nom') . "\" /></a>
                <p>" . $apartat->__get('nom') . "</p>
            </div>";
        }

        return $html;
    }
}
