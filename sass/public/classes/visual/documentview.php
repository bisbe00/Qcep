<?php

class DocumentView{
    public static function show($proces, $documents, $error){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/header.php";
        include "template/maindocuments.php";
        include "template/footer.php";
        echo "</body></html>";
    }

    public static function edit($error, $saved){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/header.php";
        include "template/maindocuments.php";
        include "template/footer.php";
        echo "</body></html>";
    }
}
