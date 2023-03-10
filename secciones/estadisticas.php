<?php include('../config/db.php');
$conexionDB = database::crearInstancia();

$sql = "SELECT COUNT(*) FROM usuarios";
$listaUsuarios = $conexionDB->prepare($sql);
$listaUsuarios->execute();
$cantidadUsuarios = $listaUsuarios->fetchColumn();

$sql = "SELECT COUNT(*) FROM socios";
$listaSocios = $conexionDB->prepare($sql);
$listaSocios->execute();
$cantidadSocios = $listaSocios->fetchColumn();


$sql = "SELECT COUNT(*) FROM actividades";
$listaActividades = $conexionDB->prepare($sql);
$listaActividades->execute();
$cantidadActividades = $listaActividades->fetchColumn();


$sql = "SELECT COUNT(*) FROM comisiones";
$listaComisiones = $conexionDB->prepare($sql);
$listaComisiones->execute();
$cantidadComisiones = $listaComisiones->fetchColumn();


//comisiones
$sql = "SELECT COUNT(idComision) FROM socios_comisiones WHERE idComision=1";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosDirectiva = $query->fetchColumn();

$sql = "SELECT COUNT(idComision) FROM socios_comisiones WHERE idComision=2";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosDeportes = $query->fetchColumn();

$sql = "SELECT COUNT(idComision) FROM socios_comisiones WHERE idComision=3";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosPrensa = $query->fetchColumn();

$sql = "SELECT COUNT(idComision) FROM socios_comisiones WHERE idComision=4";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosCultura = $query->fetchColumn();

//actividades
$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=1";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosFutbol = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=2";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosRugby = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=3";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosHockey = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=4";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosTaekwondo = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=5";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosTenis = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=6";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosGimnasio = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=7";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosPadel = $query->fetchColumn();

$sql = "SELECT COUNT(idActividad) FROM socios_actividades WHERE idActividad=8";
$query = $conexionDB->prepare($sql);
$query->execute();
$sociosAjedrez = $query->fetchColumn();

?>
