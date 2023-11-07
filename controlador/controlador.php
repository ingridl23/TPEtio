<?php

include_once "modelo/modelo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $usuarioNuevo = new modelo();

    try {
        $usuarioNuevo->BaseDeDatos($nombre, $apellido, $email, $contraseña);

        session_start();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['email'] = $email;
        header("Location: vista.php");
        die(); 
    } catch (Exception $e) {
        echo "¡Error al registrar usuario: " . $e->getMessage();
    }
} else {
    echo "¡Problemas al registrarse!"; 
    //por ejemplo el correo ya fue registrado en la base de datos
}
// Inicio de sesión
if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $usuarioEncontrado = $miModelo->getUserByPassword($usuario);

    if ($usuarioEncontrado && password_verify($contraseña, $usuarioEncontrado->contraseña)) {

        session_start();
        $_SESSION['usuario'] = $usuarioEncontrado;

        header('Location: home.php'); //adaptar a smarty
        exit();
    } else {
    
        echo "Nombre de usuario o contraseña incorrectos";
    }
}

?>









