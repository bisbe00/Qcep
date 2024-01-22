<?php

class LoggedController
{

    public function connected()
    {
        $apartats = [];
        $apartatM = new ApartatModel();
        $apartats = $apartatM->read();
        LoggedView::show($apartats);
    }
}

?>