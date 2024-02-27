<?php

class LoginView{
    public function show($lang,$translator,$main,$footer){
        require_once $translator;
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
        include "template/header.php";
        include "template/mainlogin.php";
        include "template/footer.php";
        echo "</body></html>";
    }
}

?>