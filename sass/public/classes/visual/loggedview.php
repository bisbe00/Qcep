<?php

class LoggedView{
    public static function show($main) {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
	    include "template/header.php";
	    include "template/mainproces.php";
        include "template/footer.php";
		echo "</body></html>";
    }
}
