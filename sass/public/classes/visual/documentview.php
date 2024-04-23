<?php

class DocumentView{
    // public static function show($header,$main,$footer){
    public static function show($header, $proces, $documents, $footer){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/headerlogged.php";
        include "template/maindocuments.php";
        include "template/footer.php";
        echo "</body></html>";
    }
}
