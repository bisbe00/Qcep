<?php

class HomeController {

    public function __construct() {
        
    }
    
    public function show() {
        
        if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["lang"])) {
            $lang = $_GET["lang"];
            setcookie("lang",$lang,time()+3600);
        } else {
            if (isset($_COOKIE["lang"])) {
                $lang = $_COOKIE["lang"];
            } else {
                $lang = "en";
            }
        }
        
        $translator = "languages/{$lang}_translate.php";
        
        
        HomeView::show($lang, $translator);      
        
    }
}

?>