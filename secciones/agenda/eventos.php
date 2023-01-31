<?php include('../../config/db.php');
$conexionDB = database::crearInstancia();
//print_r($_POST);
//$evento = isset($_POST['evento']) ? $_POST['evento'] : "";

//validación de info de llegada:
if(empty($_POST['evento']) || empty($_POST['start']) || empty($_POST['color'])) {
    $mensaje= array('msg' => 'todos los campos son requeridos', 'estado');

} else {
    $evento=$_POST ['evento'];
    $start=$_POST ['start'];
    $color=$_POST ['color'];

    echo "<br />";
    echo $evento;
    echo "<br />";
    echo $start;
    echo "<br />";
    echo $color;

    $sql = "INSERT INTO eventos(evento, start, color) VALUES (:evento, :start, :color)";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':evento', $evento);
    $query->bindParam(':start', $start);
    $query->bindParam(':color', $color);
    $query->execute();
    
    //$data = $query->fetchAll();
    // if ($data==1){
    //     $msg=1;
    // } else {
    //     $msg=0;
    // }
    // return $msg;

    // echo $msg;
    //echo $data;
   
            //header("Location:../vista_usuarios.php");
}


//mostrar todos los eventos
$sql = "SELECT * FROM eventos";
$listaEventos = $conexionDB->query($sql);
$eventos = $listaEventos->fetchAll();
//print_r($eventos);
echo json_encode($eventos, JSON_UNESCAPED_UNICODE);



//INSERT INTO `eventos` (`id`, `evento`, `description`, `start`, `color`, `textColor`, `end`) VALUES ('1', 'Evento 1', 'Descripción de EVENTO 1', '2023-01-25 12:12:18.000000', '#00623d', '#930000', '2023-01-25 13:12:18.000000');
?>