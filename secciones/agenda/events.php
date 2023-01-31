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


?>