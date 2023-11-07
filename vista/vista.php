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
    function showHome(){
        $this->smart->display('template/home.tpl');
    }
    function showLogin(){
        $this->smart->display('template/login.tpl');

    }
    function showRegister(){
        $this->smart->display('template/register.tpl');
    }
    function showFooter(){
        $this->smart->display('template/footer.tpl');
        
    }
}