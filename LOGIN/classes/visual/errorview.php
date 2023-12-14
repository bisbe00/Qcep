<?php

class ErrorView {

    public function show(Exception $e){
        if (isset($_COOKIE["lang"])) {
            $lang = $_COOKIE["lang"];
        } else {
            $lang = "en";
        }
        $fitxerDeTraduccions = "languages/{$lang}_translate.php";
        include $fitxerDeTraduccions;
        
        $titol = "hi ha hagut un error";
        $missatge = $e->getMessage();
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/header.php";
        include "template/mainerror.php";
        echo "</body></html>";
    }
}

?>