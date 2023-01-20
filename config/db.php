<?php
    class db {
        private $host="localhost";
        //private $dbname="club";
        private $dbname="app_club";
        private $user="root";
        private $password="";
        //conexión
        //PDO_MYSQL es un controlador que implementa la interfaz de Objetos de Datos de PHP (PDO) para permitir el acceso de PHP a bases de datos de MySQL
        public function conexion() {
            try {
                $PDO = new PDO("mysql:host=". $this->host.";dbname=" . $this->dbname, $this->user,  $this->password);
                return $PDO;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
     //se crea nuevo objeto para usar la función creada
     //$obj = new db();
     //VISUALIZAMOS LA CONEXION PARA VERIFICAR
     //print_r($obj->conexion());



     /***************** by appClub *****************/

     class database {
        public static $instancia=null;
        public static function crearInstancia() {
            if (!isset(self::$instancia)) {
                //consultamos si hay conexión y usamos propiedad para controlar los errores [PDO::ATTR_ERRMODE]
                // y manejo de excepciones PDO::ERRMODE_EXCEPTION
                $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

                /***************** ver dbname*****************/
                self::$instancia = new PDO('mysql:host=localhost;dbname=app_club', 'root', '', $opciones);
                //echo "conectado a la base de datos!";
            } 
            return self::$instancia;
        }
    }
?>