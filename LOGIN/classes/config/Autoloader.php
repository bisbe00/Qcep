<?php

class Autoloader{
    private const CARPETAS = ['model', 'visual', 'controller', 'config'];

    public static function load($clase){
        foreach (self::CARPETAS as $carpeta) {
            if (file_exists("classes/$carpeta/".strtolower($clase).'.php')) {
                include "classes/$carpeta/".strtolower($clase).'.php';
                return;
            }
        }

        // throw new Exception("No s'ha trobat la definicio de la classe $clase");
    }

    public static function newLoad($clase){
        foreach (self::CARPETAS as $carpeta) {
            if (file_exists("classes/$carpeta/".strtolower($clase).'class.php')) {
                include "classes/$carpeta/".strtolower($clase).'class.php';
                return;
            }
        }

        // throw new Exception("No s'ha trobat la definicio de la classe $clase");
    }

    public static function oldLoad($clase){
        foreach (self::CARPETAS as $carpeta) {
            if (file_exists("classes/$carpeta/".$clase.'.php')) {
                include "classes/$carpeta/".$clase.'.php';
                return;
            }
        }

        throw new Exception("No s'ha trobat la definicio de la classe $clase");
    }

       //always the exception remain in the last function, because in order to continue 
       //with the next function, according to the position placed in index.php
}

?>