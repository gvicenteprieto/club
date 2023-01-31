<?php
//enlazar el modelo 
class homeController
{
    private $MODEL;
    public function __construct() {
        include("../../model/homeModel.php");
        //accedemos al valor del modelo:generamos el objeto con el atributo privado MODEL
        $this->MODEL = new HomeModel();
    }

    public function guardarUsuario($dni, $usuario, $apellidos, 
                                    $nombres, $email, $pass, $primera_vez, $perfil) {
        $valor = $this->MODEL->agregarUsuario(
            $this->limpiarCadena($dni),
            $this->limpiarCadena($usuario),
            $this->limpiarCadena($apellidos),
            $this->limpiarCadena($nombres),
            $this->limpiarCorreo($email),
            //se almacena la contraseña ya encriptada
            $this->encriptarPass($this->limpiarCadena($pass)),
            $this->limpiarCadena($primera_vez),
            $this->limpiarCadena($perfil)
        );
        return $valor;
    }

    public function editarUsuario($dni, $usuario, $apellidos, 
                                    $nombres, $email, $pass, $primera_vez=1) {
        $valor = $this->MODEL->modificarUsuario(
            $this->limpiarCadena($dni),
            $this->limpiarCadena($usuario),
            $this->limpiarCadena($apellidos),
            $this->limpiarCadena($nombres),
            $this->limpiarCorreo($email),
            $this->encriptarPass($this->limpiarCadena($pass)),
            $this->limpiarCadena($primera_vez),
             //$this->limpiarCadena($perfil)
        );
        return $valor;
    }

    public function mostrarUsuarios($dni, $usuario, $apellidos, $nombres, $email, $pass) {
        $valor = $this->MODEL->users(
            $this->limpiarCadena($dni),
            $this->limpiarCadena($usuario),
            $this->limpiarCadena($apellidos),
            $this->limpiarCadena($nombres),
            $this->limpiarCorreo($email),
            $this->encriptarPass($this->limpiarCadena($pass))
        );
        return $valor;
    }

    //FUNCIONES DE LIMPIEZA CON FUNCIONES DE PHP
    public function limpiarCadena($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    public function limpiarCorreo($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    //ENCRIPTAR LA CONTRASEÑA
    public function encriptarPass($pass) {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    //verificar extrayendo el hash
    public function verificarUsuario($usuario, $pass)
    {
        //se extrae el hash almacenado en la base de datos, 
        //acediendo al modelo y a la función obtenerClave
        //$keydb = $this->MODEL->obtenerClave($email);
        $keydb = $this->MODEL->obtenerClave($usuario);
        return (password_verify($pass, $keydb)) ? true : false;
    }
}
?>