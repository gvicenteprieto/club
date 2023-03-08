<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";
$sql_search = "SELECT * FROM comisiones where nombre_comision like '%" . $buscar . "%' 
               OR lugar like '%" . $buscar . "%' OR dia like '%" . $buscar . "%'";
$sql_query = $conexionDB->prepare($sql_search);
$sql_query->execute();
$sql_response = $sql_query->fetchAll();

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nombre_comision = isset($_POST['nombre_comision']) ? $_POST['nombre_comision'] : "";
$lugar = isset($_POST['lugar']) ? $_POST['lugar'] : "";
$dia = isset($_POST['dia']) ? $_POST['dia'] : "";
$horaInicio = isset($_POST['horaInicio']) ? $_POST['horaInicio'] : "";
$horaFin = isset($_POST['horaFin']) ? $_POST['horaFin'] : "";

$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

if ($accion != "") {
   switch ($accion) {
      case "agregar":
         $sql = "INSERT INTO comisiones (id, nombre_comision, lugar, dia, horaInicio, horaFin) 
          VALUES (null, :nombre_comision, :lugar, :dia, :horaInicio, :horaFin)";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':nombre_comision', $nombre_comision);
         $query->bindParam(':lugar', $lugar);
         $query->bindParam(':dia', $dia);
         $query->bindParam(':horaInicio', $horaInicio);
         $query->bindParam(':horaFin', $horaFin);
         $query->execute();
      break;
      case "editar":
         $sql = "UPDATE comisiones SET nombre_comision=:nombre_comision, lugar=:lugar, dia=:dia, horaInicio=:horaInicio, horaFin=:horaFin
          WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->bindParam(':nombre_comision', $nombre_comision);
         $query->bindParam(':lugar', $lugar);
         $query->bindParam(':dia', $dia);
         $query->bindParam(':horaInicio', $horaInicio);
         $query->bindParam(':horaFin', $horaFin);
         $query->execute();
      break;
      case "borrar":
         $sql = "DELETE FROM comisiones WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->execute();
      break;
      case "seleccionar":
         $sql = "SELECT * FROM comisiones WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->execute();
         $comision = $query->fetch(PDO::FETCH_ASSOC);

         $nombre_comision = $comision['nombre_comision'];
         $lugar = $comision['lugar'];
         $dia = $comision['dia'];
         $horaInicio = $comision['horaInicio'];
         $horaFin = $comision['horaFin'];
         break;
   };
};

// 1.
$query = $conexionDB->prepare("SELECT * FROM comisiones");
$query->execute();
$listaComisiones = $query->fetchAll();

 ?>
