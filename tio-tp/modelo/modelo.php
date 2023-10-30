<?php

class UsuarioNuevo {

    private $conexion;

    function __construct() {
        $this->conexion = new PDO('mysql:host=localhost;dbname=tpe_tio;charset=utf8', 'root', '');
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function cargarDatos($nombre, $apellido, $email, $contrasena) {
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $consulta = 'INSERT INTO registro (nombre, apellido, email, contraseña) VALUES (?, ?, ?, ?)';

            $query = $this->conexion->prepare($consulta);
            $query->execute([$nombre, $apellido, $email, $hash]);
        }
    }
?>
