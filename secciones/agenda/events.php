<?php
include('../../config/db.php');
$conexionDB = database::crearInstancia();

$sql = "SELECT * FROM eventos";
$listaEventos = $conexionDB->query($sql);
$eventos = $listaEventos->fetchAll();
echo json_encode($eventos, JSON_UNESCAPED_UNICODE);

// require_once 'dbConfig.php';

// $where_sql= '';
// if(!empty($_GET['start']) && !empty($_GET['end'])){
//     $where_sql .= " WHERE start BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' ";
// }

// $sql = "SELECT * FROM eventos $where_sql";
// $result = $db->query($sql);

// $eventsArr = array();

// if($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         array_push($eventsArr, $row);
//     }
// }
// echo json_encode($eventsArr);

$accion=isset($_POST['accion'])?$_POST['accion']:"";
$title = isset($_POST['evento']) ? $_POST['evento'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

print_r($accion);

if($accion!="") {
    switch($accion){
       case "agregar":
        $sql = "INSERT INTO eventos (title, description, start, end) 
        VALUES (:title, :description, :start, :end)";
        $query = $conexionDB->prepare($sql);
        //$query->bindParam(':id',$id);
        $query->bindParam(':title', $title);
        $query->bindParam(':description', $description);
        $query->bindParam(':start', $start);
        $query->bindParam(':end', $end);
        $query->execute();
        echo json_encode($query, JSON_UNESCAPED_UNICODE);
        break;
    }

 }

?>