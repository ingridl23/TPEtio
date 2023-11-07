<?php

class modelo {

        private $conexion;

        function __construct(){
            $this->conexion= new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }
        function BaseDeDatos($nombre,$apellido,$email,$contraseña){
          // Hashear la contraseña antes de almacenarla
          $contraseña_hasheada = password_hash($contraseña, PASSWORD_DEFAULT);
          $consulta= 'INSERT INTO registro (id_user, nombre, apellido, email, contraseña) VALUES (?,?,?,?)';
          $query= $this->conexion->prepare($consulta);
          $query->execute([$nombre,$apellido,$email,$contraseña]); // Usar la "contraseña_hasheada" en lugar de "contraseña"
          $resp=$query->fetchAll(PDO::FETCH_OBJ); 
         // No es necesario fetchAll() después de una inserción, ya que no devuelve filas.
         //id_user es autoincremental no se insertan datos en el y por lo tanto no se deben insertar valores alli.
    }

    function getUserByPassword($usuario){
        $query = $this->conexion->prepare("SELECT * FROM registro WHERE nombre= ? ");
        $query->execute([$usuario]);
        $resultado=$query->fetch(PDO::FETCH_OBJ);
        return $resultado; //retorna un obj con todos los atributos luego se sigue en el controlador para sesiones//
    }

}

?>
