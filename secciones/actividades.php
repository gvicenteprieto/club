<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";
$sql_search = "SELECT * FROM actividades where nombre_actividad like '%" . $buscar . "%' 
               OR lugar like '%" . $buscar . "%'";
$sql_query = $conexionDB->prepare($sql_search);
$sql_query->execute();
$sql_response = $sql_query->fetchAll();

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nombre_actividad = isset($_POST['nombre_actividad']) ? $_POST['nombre_actividad'] : "";
$lugar = isset($_POST['lugar']) ? $_POST['lugar'] : "";
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

if ($accion != "") {
   switch ($accion) {
      case "agregar":
         $sql = "INSERT INTO actividades (id, nombre_actividad, lugar) 
          VALUES (null, :nombre_actividad, :lugar)";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':nombre_actividad', $nombre_actividad);
         $query->bindParam(':lugar', $lugar);
         $query->execute();
      break;
      case "editar":
         $sql = "UPDATE actividades SET nombre_actividad=:nombre_actividad, lugar=:lugar 
          WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->bindParam(':nombre_actividad', $nombre_actividad);
         $query->bindParam(':lugar', $lugar);
         $query->execute();
      break;
      case "borrar":
         $sql = "DELETE FROM actividades WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->execute();
         //echo $sql;
      break;
      case "seleccionar":
         $sql = "SELECT * FROM actividades WHERE id=:id";
         $query = $conexionDB->prepare($sql);
         $query->bindParam(':id', $id);
         $query->execute();
         $actividad = $query->fetch(PDO::FETCH_ASSOC);
         //que se almacene en nombre_actividad el resuktado de la consulta
         $nombre_actividad = $actividad['nombre_actividad'];
         $lugar = $actividad['lugar'];
         //echo $nombre_actividad;
         break;
   };
};

// 1.
//CONSULTA PARA MOSTRAR EL LISTADO DE ACTIVIDADES EN LA VISTA vista_actividades.php
//luego de recepcionar lso datos en POST:
$query = $conexionDB->prepare("SELECT * FROM actividades");
$query->execute();
//fetch all muestra todos los datos
$listaActividades = $query->fetchAll();
 //print_r($listaActividades);
 //ahora mostrarla: en lista de actividades