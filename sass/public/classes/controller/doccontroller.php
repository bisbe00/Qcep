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

            $proces_id = $_GET["proces"];

            $document = new Document(null,null, null, null, $proces_id);
            $documentModel = new DocumentModel();
            $result = $documentModel->getDocumentByProcesNom($document);

            if (count($result) !== 0) {
                $data = $result;
            }

            $proces = new Proces($proces_id, null, null, null,null);
            $procesM = new ProcesModel();
            $resultProces = $procesM->read($proces);
        }

        $organitzacio = new Organitzacio(2,'Thos i Codina',null,null,null);
        $organitzacioM = new OrganitzacioModel();
        $org = $organitzacioM->read($organitzacio);
        $header = $this->generateHeader($org);

        $apartatM = new ApartatModel();
        $apartats = $apartatM->getTable();
        $footer = $this->generateFooter($apartats);

        DocumentView::show($data, $resultProces, $header, $footer);
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

    public function generateFooter($apartats)
    {
        $html = '';
        foreach ($apartats as $apartat) {
            $html .= "
            <div>
                <a href=\"" . $apartat->__get('link') . "\" target=\"_blank\"><img src=\"" . $apartat->__get('icona') . "\" alt=\"" . $apartat->__get('nom') . "\" /></a>
                <p>" . $apartat->__get('nom') . "</p>
            </div>";
        }

        return $html;
    }
}
