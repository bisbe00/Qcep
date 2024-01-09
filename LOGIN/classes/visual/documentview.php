<?php

class DocumentView{
    public static function show($data){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/headerdocuments.php";
        include "template/maindocuments.php";
        echo "</body></html>";
    }
}

?>