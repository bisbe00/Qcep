<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
class LoggedController
{

    public function connected()
    {

        $organitzacio = new Organitzacio('Thos i Codina',null,null,null);
        $organitzacioM = new OrganitzacioModel();
        $org = $organitzacioM->read($organitzacio);
        $header = $this->generateHeader($org);
       
        $apartats = [];
        $apartatM = new ApartatModel();
        $apartats = $apartatM->read();
        $footer = $this->generateFooter($apartats);

        LoggedView::show($header,$footer);
    }

    public function generateHeader($org){
        $html = "";
        foreach($org as $inc){
            $html = $html . "
            <div class=\"inc\">
                <a href=\"".$inc->web."\"><img class=\"logo\" src=\"".$inc->logo."\" alt=\"".$inc->nom."\"/></a>
                <h2>".$inc->nom."</h2>
            </div>
            <button class=\"logOut\"><a href=\"?home/show\">Log Out</a></button>";
        }
        return $html;
    }

    public function generateFooter($apartats)
    {
        $html = '';
        foreach ($apartats as $apartat) {
            $html = $html . "
            <div>
                <a href=\"" . $apartat->link . "\" target=\"_blank\"><img src=\"" . $apartat->icona . "\" alt=\"" . $apartat->nom . "\" /></a>
                <p>" . $apartat->nom . "</p>
            </div>";
        }

        return $html;
    }
}

?>