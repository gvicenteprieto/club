<?php include('../config/db.php');
$conexionDB = database::crearInstancia();
$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";
$sql_search = "SELECT id, dni, usuario, apellidos, nombres, email 
                FROM usuarios where usuario like '%" . $buscar . "%' 
                OR dni like '%" . $buscar . "%'
                OR apellidos like '%" . $buscar . "%'
                OR nombres like '%" . $buscar . "%'
                OR email like '%" . $buscar . "%'";

$sql_query = $conexionDB->prepare($sql_search);
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
$actividades = isset($_POST['actividades']) ? $_POST['actividades'] : "";
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
$idAct=isset($_POST['idAct']) ? $_POST['idAct'] : "";
print_r($idAct);
if ($accion != "") {
    switch ($accion) {
        case "agregar":
            $pass = '12345.678';
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (dni, usuario, apellidos, nombres, email, pass) 
            VALUES (:dni, :usuario, :apellidos, :nombres, :email, :pass)";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':dni', $dni);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':apellidos', $apellidos);
            $query->bindParam(':nombres', $nombres);
            $query->bindParam(':email', $email);
            $query->bindParam(':pass', $pass);
            $query->execute();
            $idUser = $conexionDB->lastInsertId();
            if ($actividades) {
                foreach ($actividades as $actividad) {
                    $sql = "INSERT INTO usuarios_actividades (id, idUsuario, idActividad) 
                VALUES (null, :idUsuario, :idActividad)";
                    $query = $conexionDB->prepare($sql);
                    $query->bindParam(':idUsuario', $idUser);
                    $query->bindParam(':idActividad', $actividad);
                    $query->execute();
                };
            };
        break;
        case "borrar":
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
        break;
        case "editar":
            $pass = password_hash($pass, PASSWORD_DEFAULT);
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
        break;
        case "agregarAct":
            $sql = "SELECT * FROM usuarios WHERE id=:id or dni=:dni";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':dni', $dni);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $id = $user['id'];
            $dni = $user['dni'];
            $usuario = $user['usuario'];
            $apellidos = $user['apellidos'];
            $nombres = $user['nombres'];
            $email = $user['email'];
            foreach ($actividades as $actividad) {
                //INSERT INTO `usuarios_actividades` (`id`, `idUsuario`, `idActividad`) VALUES (NULL, '72', '3');
                $sql = "INSERT INTO usuarios_actividades (id, idUsuario, idActividad) 
                VALUES (null, :idUsuario, :idActividad)";
                $query = $conexionDB->prepare($sql);
                $query->bindParam(':idUsuario', $id);
                $query->bindParam(':idActividad', $actividad);
                $query->execute();
            };
        break;
        case "editarAct":
            $sql = "SELECT * FROM usuarios WHERE id=:id or dni=:dni";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':dni', $dni);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $id = $user['id'];
            $dni = $user['dni'];
            $usuario = $user['usuario'];
            $apellidos = $user['apellidos'];
            $nombres = $user['nombres'];
            $email = $user['email'];
            //aquí obtenemos todos los cursos del usuario
            $sql = "SELECT actividades.id FROM usuarios_actividades 
            INNER JOIN actividades ON actividades.id=usuarios_actividades.idActividad 
            WHERE usuarios_actividades.idUsuario=:idUsuario";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(":idUsuario", $id);
            $query->execute();
            $actividadesUsuario = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($actividadesUsuario as $actividadUsuario) {
                //echo $actividadUsuario['id'];
                //para meter todas las actividades del usuario en un array
                $arrayActividadesUsuarios[] = $actividadUsuario['id'];
            };
            print_r($actividadesUsuario);
        break;
        case "borrarAct":
            $pass = password_hash($pass, PASSWORD_DEFAULT);
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
            if (isset($actividades)) {
                $sql="DELETE FROM usuarios_actividades WHERE idUsuario=:idUsuario";
                $query = $conexionDB->prepare($sql);
                $query->bindParam(":idUsuario", $id);
                $query->execute();
                // foreach ($actividades as $actividad) {
                //     $sql = "INSERT INTO usuarios_actividades (id, idUsuario, idActividad) 
                //     VALUES (null, :idUsuario, :idActividad)";
                //     $query = $conexionDB->prepare($sql);
                //     $query->bindParam(':idUsuario', $id);
                //     $query->bindParam(':idActividad', $actividad);
                //     $query->execute();
                // };
                //$arrayActividadesUsuarios=$actividades;
                //print_r($actividades);
                echo "Actividades " . $actividades;
                //DELETE FROM usuarios_actividades WHERE `usuarios_actividades`.`id` = 80"
            };
        break;
    };
};

//mostrar todos los usuarios menos admin ni root
$sql = "SELECT * FROM usuarios where usuario != 'admin' and usuario != 'root'";
$listaUsuarios = $conexionDB->query($sql);
$usuarios = $listaUsuarios->fetchAll();

//actividades de cada usuario
foreach ($usuarios as $clave => $usuario) {
    $sql = "SELECT * FROM actividades 
    WHERE id IN (SELECT idActividad FROM usuarios_actividades WHERE idUsuario = :idUsuario)";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':idUsuario', $usuario['id']);
    $query->execute();
    $actividadesUsuario = $query->fetchAll();
    $usuarios[$clave]['actividades'] = $actividadesUsuario;
};

//actividades disponibles:
$sql = "SELECT * FROM actividades";
$listadoActividades = $conexionDB->query($sql);
$actividades = $listadoActividades->fetchAll();
