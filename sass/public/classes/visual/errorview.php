<?php

class ErrorView {

    public function show(Exception $e){
        $titol = "hi ha hagut un error";
        $missatge = $e->getMessage();
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/header.php";
        include "template/mainerror.php";
        include "template/footer.php";
        echo "</body></html>";
    }
}
