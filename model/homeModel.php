<?php
    class homeModel {
        private $PDO;
        public function __construct() {
        //ENLAZANDO A LA BASE DE DATOS
        //require_once ("c://wamp64/www/login/config/db.php");
        include("../../config/db.php");

        //CREANDO OBJETO Y ACCEDIENDO A LA CONEXIÓN EN EL ATRIBUTO PDO
        $pdo = new db();
        $this->PDO = $pdo->conexion();
        }

        public function agregarUsuario($dni, $usuario, $apellidos, $nombres, $email, $pass){
            $statement = $this->PDO-> prepare("INSERT INTO usuarios (dni, usuario, apellidos, nombres, email, pass)
                values (:dni, :usuario, :apellidos, :nombres, :email, :pass)");
            $statement->bindParam(":dni",$dni);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":apellidos",$apellidos);
            $statement->bindParam(":nombres",$nombres);
            $statement->bindParam(":email",$email);    
            $statement->bindParam(":pass",$pass);
            // $statement ->bindParam(":primera_vez",$primera_vez);
            // $statement ->bindParam(":perfil",$perfil);
            //try catch para terminar la función: si se ejecuta bien: true, sino si hay error return false:
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function modificarUsuario($dni, $usuario, $apellidos, $nombres, $email, $pass){
            $statement = $this->PDO-> prepare("UPDATE usuarios 
                SET dni=:dni, usuario=:usuario, apellidos=:apellidos, nombres=:nombres, email=:email, pass=:pass 
                WHERE usuario=:usuario");
            $statement->bindParam(":dni",$dni);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":apellidos",$apellidos);
            $statement->bindParam(":nombres",$nombres);
            $statement->bindParam(":email",$email);    
            $statement->bindParam(":pass",$pass);
            // $statement ->bindParam(":primera_vez" , $primera_vez);
            // $statement ->bindParam(":perfil" , $perfil);
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }


        public function users($dni, $usuario, $apellidos, $nombres, $email, $pass){
            $statement = $this->PDO-> prepare("SELECT * from usuarios");
            $statement->bindParam(":dni",$dni);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":apellidos",$apellidos);
            $statement->bindParam(":nombres",$nombres);
            $statement->bindParam(":email",$email);    
            $statement->bindParam(":pass" , $pass);
            // $statement ->bindParam(":primera_vez" , $primera_vez);
            // $statement ->bindParam(":perfil" , $perfil);
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        //función para obtener la clave almacenada en la base de datos, en base al email que es de tipo UNIQUE
        public function obtenerClave($usuario) {
            $statement = $this->PDO->prepare("SELECT pass FROM usuarios WHERE usuario = :usuario");
            $statement->bindParam(":usuario", $usuario);
            //en el return utilizo fecth y no bindParam porque sólo extraemos una parte de un registro; 
            //fetch y dentro de corchetes 'pass': seleccionando un registro y extrayendo solamente un campo
            //se exportará al controlador
            return ($statement->execute()) ? $statement->fetch()['pass'] : false;
            
        }
    }
?>