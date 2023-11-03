<?php 
require_once 'controller/controlador.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



if(!empty($_GET['action'])){    
    $action = $_GET['action'];
} else {
    $action = 'home';
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
    $userController = new userController();
    $userController->mostrarHome();
    break;
    case 'singUp':
    $userController = new UsuarioNuevo();
    $userController->procesarRegistro();
    break;
    case 'login':
    $userController = new UsuarioNuevo();
    $userController->iniciarSesion();
    break;
    default:
        echo '404 Pagina no encontrada';
    break;                
}



?>