<?php

class modelo {

        private $conexion;

        function __construct(){
            $this->conexion= new PDO('mysql:host=localhost;'.'dbname= tpe_tio;charset=utf8', 'root', '');
        }
        function BaseDeDatos($nombre,$apellido,$email,$contraseña){
          $consulta= 'INSERT INTO registro (id_user, nombre, apellido, email, contraseña) VALUES (?,?,?,?)';
          $query= $this->conexion->prepare($consulta);
          $query->execute([$nombre,$apellido,$email,$contraseña]);
          $resp=$query->fetchAll(PDO::FETCH_OBJ);
    }
}


?>