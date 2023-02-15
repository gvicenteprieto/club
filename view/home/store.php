<?php
    //para mostar los distintos mensajes que puede manejar el formulario
    //require_once("c://wamp64/www/login/controller/homeController.php");

    include("../../controller/homeController.php");
    
    $obj = new homeController();
    $dni = $_POST['dni'];
    $usuario = $_POST['usuario'];
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirmPass'];
    $primera_vez= 1;
    $perfil= 1;
    $foto=$_FILES['foto'];

    //verificaciones, si algún campo está vacío se regresa a signup con advertencia:
    $error = "";
    if (empty($dni) || empty($email) || empty($usuario) || empty($apellidos) || empty($nombres) || empty($pass) || empty($confirmPass)) {
        $error .= "<li> Debe completar todos los datos </li>";
        header("Location:panelControl.php?error=" . $error . "&&dni=" . $dni. "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
    } else {
        //verificando que las contraseñas coincidan
        if ($confirmPass == $pass) {
            //si coinciden, se reutiliza el objeto que almacena el home controller para acceder a la función guardarUsuario() y se dirige a login; aunque hay otra valicación más ya que el correo debe ser único
            if ($obj->guardarUsuario($dni, $usuario, $apellidos, $nombres, $email, $pass, $foto) == false) {
                //validación, si hay error por ejemplo mismo correo que tiene tipo unique
                $error .= "<li>Correo ya registrado</li>";
                header("Location:panelControl.php?error=" . $error . "&&dni=" . $dni."&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&foto=" . $foto ."&&confirmPass=" . $confirmPass);
            } else {
                header("Location:logout.php");
            }
            //sino mensaje de error que se envará a signup.php
        } else {
            $error .= "<li>Las contraseñas no coinciden</li>";
            header("Location:panelControl.php?error=" . $error . "&&dni=" . $dni. "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
        }
    }
?>