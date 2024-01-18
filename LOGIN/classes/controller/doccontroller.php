<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

class DocController{
    public function documents(){
        $data = [];
        $resultProces = [];
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {
            $proces_nom = $_GET["proces"];
            $document = new Document(null,null,null,$proces_nom);
            $documentModel = new DocumentModel();
            $result = $documentModel->read($document);
            if(count($result) !== 0){
                $data = $result;
            }

            $proces = new Proces($proces_nom,null,null,null);
            $procesM = new ProcesModel();
            $resultProces = $procesM->read($proces);
        }
        DocumentView::show($data,$resultProces);
    }
}

?>