<?php

class LoggedView{
    public static function show() {
        echo "<!DOCTYPE html><html lang=\"en\">";
        include "template/head.php";
        echo "<body>";
	    include "template/headerlogged.php";
	    include "template/mainproces.php";
		echo "</body></html>";
    }
}

?>