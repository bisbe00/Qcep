<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class DocumentController extends Controlador
{

    public function __construct(){
        parent::__construct();
    }

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

                    $usuari_id = $proces->__get('usuari_id');
                    $usuari = new Usuari($usuari_id,null,null,null);
                    $autor = $usuari->getUsernameByID();

                    $html .= "<p><b>Author:</b>". $autor->getUsername() ."</p>";
                    $html .= "<p><b>Email:</b>".  $autor->getEmail() ."</p>";

                $html .= "</div>";

                if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
                    $html .= "<p class='new'><a href='#'>+ NEW</a></p>";
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

    // public function editDocument($saved,$error){

    //     $main = " <form action='?doc/validateNewDocument' method='post'>";

    //     $main .= "
    //     <label for='nom'>Nom: </label>
    //     <input type='text' name='nom' id='nom' value=\"".$saved->__get('nom')."\">
    //     <br>
    //     ";

    //     if(isset($error['nom'])){
    //         $main .= '<span>'.$error['nom'].'</span><br>';
    //     }

    //     $main .= "
    //     <label for=\"link\">Link:</label>
    //     <br>
    //     <input type=\"text\" id=\"link\" name=\"link\" value=\"" . $saved->__get('link') . "\">
    //     <br>";

    //     if (isset($error["link"])) {
    //         $main .= "<span>" . $error["link"] . "</span><br>";
    //     }

    //     $procesModel = new ProcesModel();
    //     $procesos = $procesModel->getTable();

    //     $main .= "<label for=\"proces_id\">Proces: </label>
    //     <br>
    //     <select id=\"proces_id\" name=\"proces_id\">";

    //     foreach ($procesos as $proces) {
    //         $main .= "<option value=\"" . $proces->__get('id') . "\">" . $proces->__get('nom') . "</option>";
    //     }

    //     $main .= "</select><br>";

    //     $main .= "<input type='submit' name='submit' id='submit' value='submit'></from>";

    //     return $main;
    // }

    // public function validate(){
    //     $saved = new Document(null, null, null, null, null);
    //     $error = [];

    //     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    //         if(isset($_POST['id'])){
    //             $id = $_POST['id'];
    //             $saved->__set('id', $id);
    //         }
            
    //         $nom = $this->sanitize($_POST['nom']);
    //         $link = $this->sanitize($_POST['link']);
    //         $proces_id = $this->sanitize($_POST['proces_id']);


    //         if (strlen($nom) === 0) {
    //             $error["nom"] = "fill the section";
    //             unset($nom);
    //         } else {
    //             if (strlen($nom) > 255) {
    //                 $error["nom"] = "nom is too long";
    //                 unset($nom);
    //             } else {
    //                 $saved->__set('nom', $nom);
    //             }
    //         }

    //         if (strlen($link) === 0) {
    //             $error["link"] = "fill the section";
    //             unset($link);
    //         } else {
    //             if (strlen($link) > 400) {
    //                 $error["link"] = "link is too long";
    //                 unset($link);
    //             } else {
    //                 $saved->__set('link', $link);

    //                 $parts = explode('.',$link);
    //                 $saved->__set('tipus',$parts[1]);

    //             }
    //         }

    //         if(isset($_GET["proces"])){
    //             $proces_id = $_GET["proces"];
    //         }else{
    //             $saved->__set('proces_id', $proces_id);
    //         }

    //         if (empty($error)) {
    //             $documentModel = new DocumentModel();

    //             if(isset($_POST["id"])){
    //                 $state = $documentModel->update($saved);
    //             }else{
    //                 $state = $documentModel->create($saved);
    //             }

    //             if ($state === true) {
    //                 header("Location: ?doc/show");
    //             }
    //         }

    //     }

    //     $organitzacio = new Organitzacio(2,'Thos i Codina',null,null,null);
    //     $organitzacioModel = new OrganitzacioModel();
    //     $organitzacions = $organitzacioModel->read($organitzacio);
    //     $header = $this->generateHeader($organitzacions);

    //     $documentModel = new DocumentModel();
    //     $dates = $documentModel->read($saved);
    //     $main = $this->editDocument($saved, $error);

    //     $apartatModel = new ApartatModel();
    //     $apartats = $apartatModel->getTable();
    //     $footer = $this->generateFooter($apartats);

    //     DocumentView::show($header, $main, $footer);

    // }

}
