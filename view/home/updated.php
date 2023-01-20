<?php
    require_once("C://wamp64/www/login/controller/homeController.php");
    //include("../controller/homeController.php");

    $obj = new homeController();
    $dni = $_POST['dni'];
    $usuario = $_POST['usuario'];
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirmPass'];
    $primera_vez= 2;
    $perfil= 2;

    $error = "";
    if (empty($dni) || empty($email) || empty($usuario) || empty($apellidos) || empty($nombres) || empty($pass) || empty($confirmPass)) {
        $error .= "<li> Debe completar todos los datos </li>";
        header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni. "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
    } else {
        if ($confirmPass == $pass) {
            if ($obj->editarUsuario($dni, $usuario, $apellidos, $nombres, $email, $pass, $primera_vez, $perfil) == false) {
                $error .= "<li>Correo ya registrado</li>";
                header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni."&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass ."&&confirmPass=" . $confirmPass );
            } else {
                header("Location:panelControl.php");
            }
        } else {
            $error .= "<li>Las contraseñas no coinciden</li>";
            header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni. "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
        }
    }
