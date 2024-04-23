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

    // public function generateMain($procesos, $documents)
    // {
    //     $main = [];
    //     $html = "";

    //     if (isset($procesos) && count($procesos) !== 0) {
    //         foreach ($procesos as $proces) {
    //             $main[] = $proces;
    //             $html .= "<div class=\"proces1\">";
    //             $html .= "<a href=\"?logged/connected\">BACK</a>";
    //             $html .= "<h2>" . $proces->__get('nom') . "</h2>";
    //             $html .= "<h3>Objectiu</h3>";
    //             $html .= "<p class=\"text\">" . $proces->__get('objectiu') . "</p>";

    //             $usuari_id = $proces->__get('usuari_id');
    //             $usuari = new Usuari($usuari_id, null, null, null);
    //             $autor = $usuari->getUsernameByID();

    //             $html .= "<p><b>Author:</b>" . $autor->getUsername() . "</p>";
    //             $html .= "<p><b>Email:</b>" . $autor->getEmail() . "</p>";

    //             $html .= "</div>";

    //             if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                 $html .= "<p class='new'><a href='#'>+ NEW</a></p>";
    //             }

    //             if (isset($documents) && count($documents) !== 0) {
    //                 $html .= "<div>";
    //                 $html .= "<table><thead>";
    //                 $html .= "<tr>";
    //                 $html .= "<th>nom</th>";
    //                 $html .= "<th>link</th>";

    //                 if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                     $html .= "<th></th><th></th>";
    //                 }

    //                 $html .= "</tr></thead><tbody>";

    //                 // Adding a form to add new documents if user is an admin
    //                 if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                     $html .= "<tr>";
    //                     $html .= "<form action='?document/create' method='post'>";
    //                     $html .= "<td>";
    //                     $html .= "<input type='text' name='nom' placeholder='New Document'>";
    //                     $html .= "</td>";
    //                     $html .= "<td>";
    //                     $html .= "<input type='text' name='link' placeholder='Document link'>";
    //                     $html .= "</td>";
    //                     $html .= "<td colspan='2'>";
    //                     $html .= "<button class='btnAdd' type='submit'>Add</button>";
    //                     $html .= "</td>";
    //                     $html .= "</form>";
    //                     $html .= "</tr>";
    //                 }

    //                 foreach ($documents as $document) {
    //                     $main[] = $document;
    //                     $html .= "<tr>";
    //                     $html .= "<td>" . $document->__get('nom') . "</td>";
    //                     $html .= "<td><a href=\"\">" . $document->__get('link') . "</a></td>";

    //                     if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    //                         $html .= "<td><button class='edit'>Edit</button></td><td><button class='delete'>Delete</button></td>";
    //                     }

    //                     $html .= "</tr>";
    //                 }

    //                 $html .= "</tbody></table>";
    //                 $html .= "</div>";
    //             }
    //         }
    //     }

    //     // return $html;
    //     return $main;
    // }

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

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // $nom = $this->sanitize($_POST["nom"]);
            // $link = $this->sanitize($_POST["link"]);


        }
    }

}
