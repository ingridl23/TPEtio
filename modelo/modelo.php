<?php

class modelo {

        private $conexion;

        function __construct($nombre,$apellido,$email,$contraseña){
            $this->conexion= new PDO('mysql:host=localhost;'.'dbname= tpe_tio;charset=utf8', 'root', '');
        }
        function BaseDeDatos(){
  
    }
}


?>