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

    function getUserByPassword($usuario){
        $query = $this->conexion->prepare("SELECT * FROM registro WHERE nombre= ? ");
        $query->execute([$usuario]);
        $resultado=$query->fetch(PDO::FETCH_OBJ);
        return $resultado; //retorna un obj con todos los atributos luego se sigue en el controlador para sesiones//
    }

}


?>