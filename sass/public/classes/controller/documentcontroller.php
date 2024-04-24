<?php

class DocumentController extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    public function generateHeader($organitzacions)
    {

        $html = "";

        foreach ($organitzacions as $organitzacio) {
            $html .= "
            <div class=\"inc\">
                <a href=\"" . $organitzacio->__get('web') . "\"><img class=\"logo\" src=\"" . $organitzacio->__get('logo') . "\" alt=\"" . $organitzacio->__get('nom') . "\"/></a>
                <h2>" . $organitzacio->__get('nom') . "</h2>
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

    public function documents()
    {

        $organitzacio = new Organitzacio(2, 'Thos i Codina', null, null, null);
        $organitzacioModel = new OrganitzacioModel();
        $organitzacions = $organitzacioModel->read($organitzacio);
        $header = $this->generateHeader($organitzacions);

        $proces = [];
        $documents = [];
        $apartats = [];

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {

            $proces_id = $_GET["proces"];

            $procesSelected = new Proces(null, $proces_id, null, null, null);
            $procesModel = new ProcesModel();
            $proces = $procesModel->read($procesSelected);

            $pid = $proces->__get('id');
            $document = new Document(null, null, null, null, $pid);
            $documentModel = new DocumentModel();
            $documents = $documentModel->getDocumentByProcesNom($document);
        }


        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        $footer = $this->generateFooter($apartats);

        DocumentView::show($header, $proces, $documents, $footer);
    }

    public function create($procesNom)
    {
        $organitzacio = new Organitzacio(2, 'Thos i Codina', null, null, null);
        $organitzacioModel = new OrganitzacioModel();
        $organitzacions = $organitzacioModel->read($organitzacio);
        $header = $this->generateHeader($organitzacions);

        $error = [];
        $saved = new Document(null,null,null,null,null);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

            $proces_id = $this->sanitize($_POST["id"]);
            $saved->__set("proces_id",$proces_id);

            $nom = $this->sanitize($_POST["nom"]);
            if(strlen($nom) == 0){
                $error["nom"] = "fill the section";
                unset($descripcio);
            }else{
                $saved->__set("nom",$nom);
            }

            $link = $this->sanitize($_POST["link"]);
            if(strlen($link) == 0){
                $error["link"] = "fill the section";
                unset($descripcio);
            }else{
                $saved->__set("link",$link);
            }

            $extensio = explode(".",$link);
            $tipus = $extensio[strlen($extensio) - 1];
            $saved->__set("tipus",$tipus);

            if(empty($error)){
                $document = new Document(null,$nom,$tipus,$link,$proces_id);
                $documentModel = new DocumentModel();
                $state = $documentModel->create($document);
                if($state){
                    header("Location: ?document/documents&proces=$procesNom");
                }
            }

        }

        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        $footer = $this->generateFooter($apartats);

        DocumentView::edit($header,$error,$saved,$footer);
    }

}
