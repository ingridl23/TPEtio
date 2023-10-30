<?php
require_once 'modelo/modelo.php';

class UsuarioNuevo {

    public function procesarRegistro($nombre, $apellido, $email, $contraseña) {

        $usuarioNuevoModel = new UsuarioNuevo();

        $usuarioNuevoModel->cargarDatos($nombre, $apellido, $email, $contraseña);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];


    $controller = new UsuarioNuevo();

    $controller->procesarRegistro($nombre, $apellido, $email, $contraseña);
}

?>
