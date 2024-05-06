<?php

class LoggedController
{

    public function connected()
    {

        $procesModel = new ProcesModel();
        $procesos = $procesModel->getTable();
        $main = $this->generateMain($procesos);

        LoggedView::show($main);
    }

    public function generateMain($procesos){
        $html = "<div class=\"cards\">";

        if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
            $html .= "<div class=\"card text-center\">
            <h1 class='new'>+ NEW</h1>
            </div>";
        }

        foreach ($procesos as $proces) {
            $html .= "<div class=\"card\">
            <h2><a href='?document/documents&proces=".$proces->__get('id')."'>".$proces->__get('nom')."</a></h2>
            </div>";
        }

        $html .= "</div>";

        return $html;
    }

}
