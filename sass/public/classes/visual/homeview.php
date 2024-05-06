<?php

class HomeView {
    public static function show($lang,$translator) {
        require_once $translator;        
        
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
	    include "template/header.php";
	    include "template/main.php";
        include "template/footer.php";
		echo "</body></html>";
    }
}
