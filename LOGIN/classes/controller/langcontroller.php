<?php

class LangController extends Controlador
{

    public function set($params = "en")
    {
        if (in_array($params[0], array("en", "es", "fr"))) {
            setcookie("lang", $params[0], time() + 3600);
        }

        $lang = $params[0];
        $translator = "languages/{$lang}_translate.php";


        $vHome = new HomeView();
        $vHome->show($lang, $translator);
    }
}

?>