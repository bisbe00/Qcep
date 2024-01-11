<?php

class HomeView {
    public static function show($lang,$translator) {
        require_once $translator;        
        $html_opacityLang[$lang]="style=\"opacity:1;\"";
        
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
	    include "template/header.php";
	    include "template/main.php";
        include "template/footer.php";
		echo "</body></html>";
    }
}

?>