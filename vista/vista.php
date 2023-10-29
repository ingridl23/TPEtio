<?php
require_once 'libs/smarty/Smarty.class.php';

class vista{

    private $smart;

    function __construct(){
        $this->smart = new Smarty();
    }

    function showHeader(){
        $this->smart->display('template/header.tpl');
    }
}