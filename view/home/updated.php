<?php
include("../../controller/homeController.php");

$obj = new homeController();
$dni = $_POST['dni'];
$usuario = $_POST['usuario'];
$apellidos = $_POST['apellidos'];
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$confirmPass = $_POST['confirmPass'];
$primera_vez = 2;
$perfil = 2;
$foto = $_FILES['foto'];


$error = "";
if (empty($dni) || empty($email) || empty($usuario) || empty($apellidos) || empty($nombres) || empty($pass) || empty($confirmPass)) {
    $error .= "<li> Debe completar todos los datos </li>";
    header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni . "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" 
     . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
} else {
    if ($confirmPass == $pass) {
        if ($obj->editarUsuario($dni, $usuario, $apellidos, $nombres, $email, $pass, $primera_vez, $foto, $perfil) == false) {
            $error .= "<li>Correo ya registrado</li>";
            header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni . "&&usuario=" . $usuario . "&&apellidos=" 
             . $apellidos . "&&nombres=" . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&foto=" . $foto . "&&confirmPass=" . $confirmPass);
        } else {
            header("Location:panelControl.php");
        }
    } else {
        $error .= "<li>Las contraseñas no coinciden</li>";
        header("Location:editProfile.php?error=" . $error . "&&dni=" . $dni . "&&usuario=" . $usuario . "&&apellidos=" . $apellidos . "&&nombres=" 
         . $nombres . "&&email=" . $email . "&&pass=" . $pass . "&&confirmPass=" . $confirmPass);
    }
};
?>

<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$file_name = $_FILES['foto']['name'];
$file_temp = $_FILES['foto']['tmp_name'];
$file_route = "../../public/img/" . $file_name;

move_uploaded_file($file_temp, $file_route);

$pass = password_hash($pass, PASSWORD_DEFAULT);
$sql = "UPDATE usuarios 
    SET dni=:dni, usuario=:usuario, apellidos=:apellidos, nombres=:nombres, 
        email=:email, foto=:file_name WHERE usuario=:usuario";
$query = $conexionDB->prepare($sql);
$query->bindParam(':id', $id);
$query->bindParam(':dni', $dni);
$query->bindParam(':usuario', $usuario);
$query->bindParam(':apellidos', $apellidos);
$query->bindParam(':nombres', $nombres);
$query->bindParam(':email', $email);
$query->bindParam(':file_name', $file_name);
$query->execute();
echo "archivo subido";

print_r($_FILES)

?>
