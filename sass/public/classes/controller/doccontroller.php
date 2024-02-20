<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

class DocController
{
    public function documents()
    {
        $data = [];
        $resultProces = [];
        $apartats = [];

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {
            $proces_nom = $_GET["proces"];
            $document = new Document(null,null, null, null, $proces_nom);
            $documentModel = new DocumentModel();
            $result = $documentModel->read($document);
            if (count($result) !== 0) {
                $data = $result;
            }

            $proces = new Proces($proces_nom, null, null, null);
            $procesM = new ProcesModel();
            $resultProces = $procesM->read($proces);
        }

        $organitzacio = new Organitzacio('Thos i Codina',null,null,null);
        $organitzacioM = new OrganitzacioModel();
        $org = $organitzacioM->read($organitzacio);
        $header = $this->generateHeader($org);

        $apartatM = new ApartatModel();
        $apartats = $apartatM->getTable();
        $footer = $this->generateFooter($apartats);

        DocumentView::show($data, $resultProces, $header, $footer);
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
                <a href=\"" . $apartat->__get('link') . "\" target=\"_blank\"><img src=\"" . $apartat->__get('icona') . "\" alt=\"" . $apartat->__get('nom') . "\" /></a>
                <p>" . $apartat->__get('nom') . "</p>
            </div>";
        }

        return $html;
    }
}

?>