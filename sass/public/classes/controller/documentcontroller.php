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
        $proveidors = [];
        $clients = [];
        $avaluacions = [];
        $saved = [];

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["proces"])) {

            $proces_id = $this->sanitize($_GET["proces"]);
            $procesModel = new ProcesModel();
            $proces = $procesModel->getProcesByID($proces_id);

            $document = new Document(null, null, null, null, $proces_id);
            $documentModel = new DocumentModel();
            $documents = $documentModel->getDocumentByProcesNom($document);

            $clientModel = new ClientModel();
            $clients = $clientModel->getClientsByID($proces_id);

            $proveidorModel = new ProveidorModel();
            $proveidors = $proveidorModel->getProveidorsByID($proces_id);

            $avaluacioModel = new AvaluacioModel();
            $avaluacions = $avaluacioModel->getTable($proces_id);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(isset($_POST['create'])){
                $this->create(); // Process creation
            }

            if(isset($_POST['delete'])){
                $this->delete();
            }
        }

        DocumentView::show($proces, $documents, $error, $saved,  $proveidors, $clients, $avaluacions);
    }

    public function create()
    {

        $saved = new Document(null, null, null, null, null);

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
            unset($link);
        } else {
            $saved->__set("link", $link);
        }

        $tipus = "document";
        $saved->__set("tipus", $tipus);


        if (empty($error)) {
            $documentModel = new DocumentModel();
            $state = $documentModel->create($saved);
            if ($state) {
                header("Location: ?document/documents&proces=$proces_id");
            }
        }
    }

    public function delete(){
        $proces_id = (int) $this->sanitize($_POST["proces_id"]);
        $id = (int) $this->sanitize($_POST['doc_id']);
        $documentModel = new DocumentModel();
        $state = $documentModel->deleteByID($id);
        if ($state) {
            header("Location: ?document/documents&proces=$proces_id");
        } 
    }

}
