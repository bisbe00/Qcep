<?php

class DocumentController extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    public function documents()
    {

        $proces = [];
        $documents = [];
        $error = [];

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {

            $proces_id = $this->sanitize($_GET["proces"]);
            $procesModel = new ProcesModel();
            $proces = $procesModel->getProcesByID($proces_id);

            $document = new Document(null, null, null, null, $proces_id);
            $documentModel = new DocumentModel();
            $documents = $documentModel->getDocumentByProcesNom($document);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $error = $this->create(); // Process creation
        }


        DocumentView::show($proces, $documents, $error);
    }

    public function create()
    {

        $error = [];
        $saved = new Document(null, null, null, null, null);
        $procesModel = new ProcesModel();

        $proces_id = (int) $this->sanitize($_POST["proces_id"]);
        $saved->__set("proces_id", $proces_id);

        $nom = $this->sanitize($_POST["nom"]);
        if (strlen($nom) == 0) {
            $error["nom"] = "fill the section";
            unset($descripcio);
        } else {
            $saved->__set("nom", $nom);
        }

        $link = $this->sanitize($_POST["link"]);
        if (strlen($link) == 0) {
            $error["link"] = "fill the section";
            unset($descripcio);
        } else {
            $saved->__set("link", $link);
        }

        $tipus = "document";
        $saved->__set("tipus", $tipus);


        if (empty($error)) {
            $documentModel = new DocumentModel();
            $state = $documentModel->create($saved);
            if ($state) {
                $Actualproces = $procesModel->getProcesByID($proces_id);
                $procesNom = $Actualproces->__get("nom");
                header("Location: ?document/documents&proces=$procesNom");
            }
        }

        return $error;
    }

}
