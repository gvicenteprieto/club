<?php

   //require_once("c://wamp64/www/login/config/db.php");

   include("../../config/db.php");

    session_start();
    $conexionDB = database::crearInstancia();
    
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario" ;
    $query = $conexionDB->prepare($sql);
    $query ->bindParam(':usuario', $usuario);
    $query->execute();
    $users=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($users as $user) {
        $passDB=$user['pass'];
    }

    if (password_verify($pass, $passDB)) {
        $_SESSION['usuario'] = $usuario;
        header("Location:panelControl.php");
    } else {
        $error .= "<li class='text-center'>Usuario o Clave incorrectos</li>";
        header("Location:login.php?error=".$error);
    }
?>