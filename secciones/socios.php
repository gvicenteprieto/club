<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";
$sql_search = "SELECT id, NSOCIO, DNI, APELLIDO, NOMBRE, CELULAR, LOCALIDAD, PARTIDO, EMAIL FROM socios 
                where DNI like '%" . $buscar . "%'
                OR NSOCIO like '%" . $buscar . "%'
                OR APELLIDO like '%" . $buscar . "%'
                OR NOMBRE like '%" . $buscar . "%'
                OR CELULAR like '%" . $buscar . "%'
                OR LOCALIDAD like '%" . $buscar . "%'
                OR PARTIDO like '%" . $buscar . "%'
                OR EMAIL like '%" . $buscar . "%'";
$sql_query = $conexionDB->prepare($sql_search);
$sql_query->execute();
$sql_response = $sql_query->fetchAll();

// print_r($sql_response);
// echo "<br><br>";


// $sql_search = "SELECT * FROM socios";
// $listaSocios = $conexionDB->query($sql_search);
// $sql_response = $listaSocios->fetchAll();
// // print_r($socios);

// //actividades de cada socio
// foreach ($response as $clave => $response) {
//     $sql = "SELECT * FROM actividades 
//     WHERE id IN (SELECT idActividad FROM socios_actividades WHERE idSocio = :idSocio)";
//     $query = $conexionDB->prepare($sql);
//     $query->bindParam(':idSocio', $socio['id']);
//     $query->execute();
//     $actividadesSocio = $query->fetchAll();
//     $response[$clave]['actividades'] = $actividadesSocio;
// };




//validación de info de llegada:
//socios
$id = isset($_POST['id']) ? $_POST['id'] : "";
$FINGRESO = isset($_POST['FINGRESO']) ? $_POST['FINGRESO'] : "";
$NSOCIO = isset($_POST['NSOCIO']) ? $_POST['NSOCIO'] : "";
$APELLIDO = isset($_POST['APELLIDO']) ? $_POST['APELLIDO'] : "";
$NOMBRE = isset($_POST['NOMBRE']) ? $_POST['NOMBRE'] : "";
$CALLE = isset($_POST['CALLE']) ? $_POST['CALLE'] : "";
$ALTURA = isset($_POST['ALTURA']) ? $_POST['ALTURA'] : "";
$ECALLE_1 = isset($_POST['ECALLE_1']) ? $_POST['ECALLE_1'] : "";
$ECALLE_2 = isset($_POST['ECALLE_2']) ? $_POST['ECALLE_2'] : "";
$PISO = isset($_POST['PISO']) ? $_POST['PISO'] : "";
$DEPTO = isset($_POST['DEPTO']) ? $_POST['DEPTO'] : "";
$PARTIDO = isset($_POST['PARTIDO']) ? $_POST['PARTIDO'] : "";
$CPOSTAL = isset($_POST['CPOSTAL']) ? $_POST['CPOSTAL'] : "";
$LOCALIDAD = isset($_POST['LOCALIDAD']) ? $_POST['LOCALIDAD'] : "";
$CELULAR = isset($_POST['CELULAR']) ? $_POST['CELULAR'] : "";
$DNI = isset($_POST['DNI']) ? $_POST['DNI'] : "";
$FNACIMIENTO = isset($_POST['FNACIMIENTO']) ? $_POST['FNACIMIENTO'] : "";
$OSOCIAL = isset($_POST['OSOCIAL']) ? $_POST['OSOCIAL'] : "";
$NAFILIADO = isset($_POST['NAFILIADO']) ? $_POST['NAFILIADO'] : "";
$EMAIL = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : "";
$OBSERVACIONES = isset($_POST['OBSERVACIONES']) ? $_POST['OBSERVACIONES'] : "";
$ESTADO = isset($_POST['ESTADO']) ? $_POST['ESTADO'] : "";
//acciones
$actividades = isset($_POST['actividades']) ? $_POST['actividades'] : "";
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";
$idAct = isset($_POST['idAct']) ? $_POST['idAct'] : "";
//print_r($_POST['accion']);

if ($accion != "") {
    switch ($accion) {
        case "agregar":
            $sql = "INSERT INTO socios (id, FINGRESO, NSOCIO, APELLIDO, NOMBRE, CALLE, ALTURA, ECALLE_1, ECALLE_2, PISO, DEPTO, PARTIDO, 
            CPOSTAL, LOCALIDAD, CELULAR, DNI, FNACIMIENTO, OSOCIAL, NAFILIADO, EMAIL, OBSERVACIONES, ESTADO) 
            VALUES (NULL, :FINGRESO, :NSOCIO, :APELLIDO, :NOMBRE, :CALLE, :ALTURA, :ECALLE_1, :ECALLE_2, :PISO, :DEPTO, :PARTIDO, 
            :CPOSTAL, :LOCALIDAD, :CELULAR, :DNI, :FNACIMIENTO, :OSOCIAL, :NAFILIADO, :EMAIL, :OBSERVACIONES, :ESTADO)";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':FINGRESO', $FINGRESO);
            $query->bindParam(':NSOCIO', $NSOCIO);
            $query->bindParam(':APELLIDO', $APELLIDO);
            $query->bindParam(':NOMBRE', $NOMBRE);
            $query->bindParam(':CALLE', $CALLE);
            $query->bindParam(':ALTURA', $ALTURA);
            $query->bindParam(':ECALLE_1', $ECALLE_1);
            $query->bindParam(':ECALLE_2', $ECALLE_2);
            $query->bindParam(':PISO', $PISO);
            $query->bindParam(':DEPTO', $DEPTO);
            $query->bindParam(':PARTIDO', $PARTIDO);
            $query->bindParam(':CPOSTAL', $CPOSTAL);
            $query->bindParam(':LOCALIDAD', $LOCALIDAD);
            $query->bindParam(':CELULAR', $CELULAR);
            $query->bindParam(':DNI', $DNI);
            $query->bindParam(':FNACIMIENTO', $FNACIMIENTO);
            $query->bindParam(':OSOCIAL', $OSOCIAL);
            $query->bindParam(':NAFILIADO', $NAFILIADO);
            $query->bindParam(':EMAIL', $EMAIL);
            $query->bindParam(':OBSERVACIONES', $OBSERVACIONES);
            $query->bindParam(':ESTADO', $ESTADO);
            $query->execute();
            $idSocio = $conexionDB->lastInsertId();
            if ($actividades) {
                foreach ($actividades as $actividad) {
                    $sql = "INSERT INTO socios_actividades (id, idSocio, idActividad) 
                VALUES (null, :idSocio, :idActividad)";
                    $query = $conexionDB->prepare($sql);
                    $query->bindParam(':idSocio', $idSocio);
                    $query->bindParam(':idActividad', $actividad);
                    $query->execute();
                };
            };
            break;
        case "seleccionar":
            $sql = "SELECT * FROM socios WHERE id=:id";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            $socio = $query->fetch(PDO::FETCH_ASSOC);
            $id = $socio['id'];
            $NSOCIO = $socio['NSOCIO'];
            $APELLIDO = $socio['APELLIDO'];
            $NOMBRE = $socio['NOMBRE'];
            $FINGRESO = $socio['FINGRESO'];
            $CALLE = $socio['CALLE'];
            $ALTURA = $socio['ALTURA'];
            $ECALLE_1 = $socio['ECALLE_1'];
            $ECALLE_2 = $socio['ECALLE_2'];
            $PISO = $socio['PISO'];
            $DEPTO = $socio['DEPTO'];
            $PARTIDO = $socio['PARTIDO'];
            $CPOSTAL = $socio['CPOSTAL'];
            $LOCALIDAD = $socio['LOCALIDAD'];
            $CELULAR = $socio['CELULAR'];
            $DNI = $socio['DNI'];
            $FNACIMIENTO = $socio['FNACIMIENTO'];
            $OSOCIAL = $socio['OSOCIAL'];
            $NAFILIADO = $socio['NAFILIADO'];
            $EMAIL = $socio['EMAIL'];
            $OBSERVACIONES = $socio['OBSERVACIONES'];
            $ESTADO = $socio['ESTADO'];

            $sql = "SELECT actividades.id FROM socios_actividades 
            INNER JOIN actividades ON actividades.id=socios_actividades.idActividad 
            WHERE socios_actividades.idSocio=:idSocio";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':idSocio', $id);
            $query->execute();

            $actividadesSocio = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($actividadesSocio as $actividad) {

                $arregloActividades[] = $actividad['id'];
            }
            break;
        case "borrar":
            $sql = "DELETE FROM socios WHERE id=:id";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            break;
        case "editar":
            $sql = "UPDATE socios 
            SET FINGRESO=:FINGRESO, NSOCIO=:NSOCIO, APELLIDO=:APELLIDO, NOMBRE=:NOMBRE, CALLE=:CALLE, ALTURA=:ALTURA, ECALLE_1=:ECALLE_1, 
            ECALLE_2=:ECALLE_2, PISO=:PISO, DEPTO=:DEPTO, PARTIDO=:PARTIDO, CPOSTAL=:CPOSTAL, LOCALIDAD=:LOCALIDAD, CELULAR=:CELULAR, DNI=:DNI, 
            FNACIMIENTO=:FNACIMIENTO, OSOCIAL=:OSOCIAL, NAFILIADO=:NAFILIADO, EMAIL=:EMAIL, OBSERVACIONES=:OBSERVACIONES, ESTADO=:ESTADO 
            WHERE NSOCIO=:NSOCIO";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':FINGRESO', $FINGRESO);
            $query->bindParam(':NSOCIO', $NSOCIO);
            $query->bindParam(':APELLIDO', $APELLIDO);
            $query->bindParam(':NOMBRE', $NOMBRE);
            $query->bindParam(':CALLE', $CALLE);
            $query->bindParam(':ALTURA', $ALTURA);
            $query->bindParam(':ECALLE_1', $ECALLE_1);
            $query->bindParam(':ECALLE_2', $ECALLE_2);
            $query->bindParam(':PISO', $PISO);
            $query->bindParam(':DEPTO', $DEPTO);
            $query->bindParam(':PARTIDO', $PARTIDO);
            $query->bindParam(':CPOSTAL', $CPOSTAL);
            $query->bindParam(':LOCALIDAD', $LOCALIDAD);
            $query->bindParam(':CELULAR', $CELULAR);
            $query->bindParam(':DNI', $DNI);
            $query->bindParam(':FNACIMIENTO', $FNACIMIENTO);
            $query->bindParam(':OSOCIAL', $OSOCIAL);
            $query->bindParam(':NAFILIADO', $NAFILIADO);
            $query->bindParam(':EMAIL', $EMAIL);
            $query->bindParam(':OBSERVACIONES', $OBSERVACIONES);
            $query->bindParam(':ESTADO', $ESTADO);
            $query->execute();
            //verificando existan actividades para actualziar
            if (isset($actividades)) {
                //se borran todas las actividades relacionadas
                $sql = "DELETE FROM socios_actividades WHERE idSocio=:idSocio";
                $query = $conexionDB->prepare($sql);
                $query->bindParam(':idSocio', $id);
                $query->execute();
                if ($actividades) {
                    foreach ($actividades as $actividad) {
                        $sql = "INSERT INTO socios_actividades (id, idSocio, idActividad) 
                        VALUES (null, :idSocio, :idActividad)";
                        $query = $conexionDB->prepare($sql);
                        $query->bindParam(':idSocio', $id);
                        $query->bindParam(':idActividad', $actividad);
                        $query->execute();
                    };
                    $arregloActividades = $actividades;
                }
            };
            break;
        case "agregarAct":
            $sql = "SELECT * FROM socios WHERE id=:id or NSOCIO=:NSOCIO";
            $query = $conexionDB->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':NSOCIO', $NSOCIO);
            $query->execute();
            $socio = $query->fetch(PDO::FETCH_ASSOC);
            $id = $socio['id'];
            $NSOCIO = $socio['NSOCIO'];
            $APELLIDO = $socio['APELLIDO'];
            $NOMBRE = $socio['NOMBRE'];
            $FINGRESO = $socio['FINGRESO'];
            $CALLE = $socio['CALLE'];
            $ALTURA = $socio['ALTURA'];
            $ECALLE_1 = $socio['ECALLE_1'];
            $ECALLE_2 = $socio['ECALLE_2'];
            $PISO = $socio['PISO'];
            $DEPTO = $socio['DEPTO'];
            $PARTIDO = $socio['PARTIDO'];
            $CPOSTAL = $socio['CPOSTAL'];
            $LOCALIDAD = $socio['LOCALIDAD'];
            $CELULAR = $socio['CELULAR'];
            $DNI = $socio['DNI'];
            $FNACIMIENTO = $socio['FNACIMIENTO'];
            $OSOCIAL = $socio['OSOCIAL'];
            $NAFILIADO = $socio['NAFILIADO'];
            $EMAIL = $socio['EMAIL'];
            $OBSERVACIONES = $socio['OBSERVACIONES'];
            $ESTADO = $socio['ESTADO'];
            foreach ($actividades as $actividad) {
                $sql = "INSERT INTO socios_actividades (id, idSocio, idActividad) 
                VALUES (null, :idSocio, :idActividad)";
                $query = $conexionDB->prepare($sql);
                $query->bindParam(':idSocio', $id);
                $query->bindParam(':idActividad', $actividad);
                $query->execute();
            };
            break;

        case "borrarActividad":
            echo "acción >borrarActividad  <br>";

            if ($idAct) {
                echo "<br> apellido: ";
                echo $APELLIDO;
                echo "<br> id actividad ";
                echo $idAct;
            };

            echo "<br> <br> fuera del if: ";
            echo "<br> apellido: ";
            echo $APELLIDO;
            echo "<br> id actividad ";
            echo $idAct;

            echo "<br> fin de acción >borrarActividad  <br>";

            break;
    };
};

$sql = "SELECT * FROM socios";
$listaSocios = $conexionDB->query($sql);
$socios = $listaSocios->fetchAll();


//actividades de cada socio
foreach ($socios as $clave => $socio) {
    $sql = "SELECT * FROM actividades 
    WHERE id IN (SELECT idActividad FROM socios_actividades WHERE idSocio = :idSocio)";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':idSocio', $socio['id']);
    $query->execute();
    $actividadesSocio = $query->fetchAll();
    $socios[$clave]['actividades'] = $actividadesSocio;
};


//actividades disponibles:
$sql = "SELECT * FROM actividades";
$listadoActividades = $conexionDB->query($sql);
$actividades = $listadoActividades->fetchAll();
