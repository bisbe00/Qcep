<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class DocController
{
    public function documents()
    {

        $organitzacio = new Organitzacio(2,'Thos i Codina',null,null,null);
        $organitzacioModel = new OrganitzacioModel();
        $organitzacions = $organitzacioModel->read($organitzacio);
        $header = $this->generateHeader($organitzacions);

        $procesos = [];
        $documents = [];
        $apartats = [];

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["proces"])) {

            $proces_id = $_GET["proces"];

            $proces = new Proces(null, $proces_id, null, null,null);
            $procesModel = new ProcesModel();
            $procesos = $procesModel->read($proces);

            if(count($procesos) > 0){
               
                foreach($procesos as $p){
                    $pid = $p->__get('id');
                    $document = new Document(null,null, null, null, $pid);
                    $documentModel = new DocumentModel();
                    $documents = $documentModel->getDocumentByProcesNom($document);
                }

            }
        }

        $main = $this->generateMain($procesos,$documents);

        $apartatModel = new ApartatModel();
        $apartats = $apartatModel->getTable();
        $footer = $this->generateFooter($apartats);

        DocumentView::show($header, $main, $footer);
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

    public function generateMain($procesos,$documents){

        $html = "";

        if(isset($procesos) && count($procesos) !== 0){
            foreach($procesos as $proces){
                $html .= "<div class=\"proces1\">";
                    $html .= "<a href=\"?logged/connected\">BACK</a>";
                    $html .= "<h2>".$proces->__get('nom')."</h2>";
                    $html .= "<h3>Objectiu</h3>";
                    $html .= "<p class=\"text\">".$proces->__get('objectiu')."</p>";
                    $html .= "<p><b>Author:</b> ".$proces->__get('usuari_id')."</p>";
                $html .= "</div>";

                if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                    $html .= "<p class='new'>+ NEW</p>";
                }
                
                if(isset($documents) && count($documents) !== 0){

                    $html .= "<div>";
                        $html .= "<table>";
                        $html .= "<tr>";
                        $html .= "<th>nom</th>";
                        $html .= "<th>link</th>";

                        if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                            $html .= "<th></th><th></th>";
                        }

                        $html .= "</tr>";
                        foreach($documents as $document){
                            $html .= "<tr>";
                            $html .= "<td>".$document->__get('nom')."</td>";
                            $html .= "<td><a href=\"\">".$document->__get('link')."</a></td>";

                            if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                                $html .= "<td><button class='edit'>Edit</button></td><td><button class='delete'>Delete</button></td>";
                            }

                            $html .= "</tr>";
                        }
                        $html .=  "</table>";
                    $html .= "</div>";
                }
            }
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
