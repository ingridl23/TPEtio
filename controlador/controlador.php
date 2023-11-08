<?php
include_once "modelo/modelo.php";
require_once "vista/vista.php";

class UserController {
    private $vista;

    public function __construct() {
        $this->vista = new Vista();
    }

    public function mostrarHome() {

        $this->vista->showHeader();
        $this->vista->showHome();  
        $this->vista->showFooter();
    }

    public function mostrarLogin() {

        $this->vista->showHeader();
        $this->vista->showLogin();
        $this->vista->showFooter();
    }

    public function mostrarRegistro() {

        $this->vista->showHeader();
        $this->vista->showRegistrer(); 
        $this->vista->showFooter();
    }

    public function procesarRegistro() {
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
        }
    }

    public function iniciarSesion() {
        if (isset($_POST['login'])) {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            $miModelo = new modelo(); 

            $usuarioEncontrado = $miModelo->getUserByPassword($usuario);

            if ($usuarioEncontrado && password_verify($contraseña, $usuarioEncontrado->contraseña)) {
                session_start();
                $_SESSION['usuario'] = $usuarioEncontrado;
                header('Location: home.php'); 
                exit();
            } else {
                echo "Nombre de usuario o contraseña incorrectos";
            }
        }
    }
}
?>