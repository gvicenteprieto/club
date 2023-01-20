<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";
$sql_search = "SELECT dni, usuario, apellidos, nombres, email 
                FROM usuarios where usuario like '%".$buscar."%' 
                OR dni like '%".$buscar."%'
                OR apellidos like '%".$buscar."%'
                OR nombres like '%".$buscar."%'
                OR email like '%".$buscar."%'";

$sql_query=$conexionDB->prepare($sql_search);
$sql_query->execute();
$sql_response = $sql_query->fetchAll();

//validación de info de llegada:
//usuarios
$id = isset($_POST['id']) ? $_POST['id'] : "";
$dni = isset($_POST['dni']) ? $_POST['dni'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";
$confirmPass = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : "";
//acciones
$actividades=isset($_POST['actividades']) ? $_POST['actividades'] : "";
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
//print_r($accion);

if ($accion != "") {
    switch ($accion) {
        case "agregar":
            $pass='12345.678';
            $pass=password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (dni, usuario, apellidos, nombres, email, pass) 
            VALUES (:dni, :usuario, :apellidos, :nombres, :email, :pass)";
            $query = $conexionDB->prepare($sql);
            //$query->bindParam(':id',$id);
            $query->bindParam(':dni', $dni);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':apellidos', $apellidos);
            $query->bindParam(':nombres', $nombres);
            $query->bindParam(':email', $email);
            $query->bindParam(':pass', $pass);
            $query->execute();
            header("Location:vista_usuarios.php");
        break;

        case "seleccionar":
            //$pass=password_hash($pass, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM usuarios WHERE id=:id or dni=:dni";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':dni', $dni);
            $query->execute();
            $user=$query->fetch(PDO::FETCH_ASSOC);
                $id=$user['id'];
                $dni=$user['dni'];
                $usuario=$user['usuario'];
                $apellidos=$user['apellidos'];
                $nombres=$user['nombres'];
                $email=$user['email'];
        break;

        case "borrar":
            $sql = "DELETE FROM usuarios WHERE dni=:dni or id=:id";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':dni', $dni);
            $query->execute();
            header("Location:vista_usuarios.php");
        break;

        case "editar":
            $pass=password_hash($pass, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios 
            SET dni=:dni, usuario=:usuario, apellidos=:apellidos, nombres=:nombres, 
            email=:email WHERE usuario=:usuario";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':dni', $dni);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':apellidos', $apellidos);
            $query->bindParam(':nombres', $nombres);
            $query->bindParam(':email', $email);
            $query->execute();
            //header("Location:vista_usuarios.php");
        break;

    }
}

//mostrar todos los usuarios menos admin ni root
$sql = "SELECT * FROM usuarios where usuario != 'admin' and usuario != 'root'";
$listaUsuarios = $conexionDB->query($sql);
$usuarios = $listaUsuarios->fetchAll();
?>