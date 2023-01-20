<?php include('../view/head/header.php'); ?>

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
    }

}
?>

<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                Perfil de Usuario:
            </h5>
            <div class="row">
                <div>
                    <div class="card p-1">
                        <br>
                        <div class="card card-header bg-secondary text-light">
                            <h5 class="fs-4 text-center ">
                                <i>
                                    <?php echo  $_SESSION['usuario']; ?>
                                </i>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive card-background">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">ID</th> -->
                                            <th scope="col">DNI</th>
                                            <!-- <th scope="col">Usuario</th> -->
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- <td><?php echo $id; ?></td> -->
                                            <td><?php echo $dni; ?></td>
                                            <!-- <td><?php echo $usuario; ?></td> -->
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
            <!-- <h4><?php echo $nombre_actividad; ?> </h4> -->
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#listaActividades');
</script>
<?php include("../view/head/footer.php"); ?>