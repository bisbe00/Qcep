<?php

class DocumentView{
    public static function show($header,$main,$footer){
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/headerlogged.php";
        include "template/maindocuments.php";
        include "template/footer.php";
        echo "</body></html>";
    }
}
