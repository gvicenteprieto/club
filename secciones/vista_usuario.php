<?php include('../view/head/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
    header("Location:../view/home/panelControl.php");
}
?>
<?php include('../secciones/usuarios.php');
if ($_SESSION['usuario']) {
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':usuario', $usuario);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $id = $user['id'];
        $dni = $user['dni'];
        $usuario = $user['usuario'];
        $apellidos = $user['apellidos'];
        $nombres = $user['nombres'];
        $email = $user['email'];
        $foto = $user['foto'];
    };
    $sqlx = "SELECT * FROM actividades 
    WHERE id IN (SELECT idActividad FROM usuarios_actividades WHERE idUsuario = :idUsuario)";
    $query = $conexionDB->prepare($sqlx);
    $query->bindParam(':idUsuario', $id);
    $query->execute();
    $actividad = $query->fetchAll();
}
?>
<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                Perfil de Usuario
            </h5>
            <div class="row">
                <div>
                    <div class="p-3">
                        <div class="row col-12">
                            <div class="col-10 text-end p-2 text-secondary fw-bold">Nombre de Usuario: </div>
                            <div class="col-2 bg-secondary text-warning text-center card fw-bold">
                                <h5 class="mt-2">
                                    <i>
                                        <?php echo $usuario; ?>
                                    </i>
                                </h5>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col-10 text-end p-2 text-secondary fw-bold"></div>

                            <div class="col-2  text-warning text-center fw-bold">
                                <?php if ($foto) : ?>
                                    <div class="text-center m-1">
                                        <img src="../public/img/<?php echo $foto; ?>" class="img-thumbnail img-fluid rounded" 
                                            width="100" alt="<?php echo $usuario; ?>" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive card-background">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>DNI</th>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $dni; ?></td>
                                            <td><?php echo $apellidos; ?></td>
                                            <td><?php echo $nombres; ?></td>
                                            <td><?php echo $email; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-10 text-end p-2 text-secondary fw-bold"></div>
            <div class="col-2  text-warning text-center fw-bold">
                <a href="../view/home/panelControl.php" class="btn btn-secondary m-2">
                    REGRESAR
                </a>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<?php include("../view/head/footer.php"); ?>