<?php

class LoggedController {

    public function __construct(){}

    public function show(){
       LoggedView::show();
    }
}

?>