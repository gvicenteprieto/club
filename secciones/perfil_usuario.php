<?php include('../view/head/header.php'); ?>

<?php include('../secciones/usuarios.php');


$id = isset($_POST['id']) ? $_POST['id'] : "";
if ($id) {
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':id', $id);
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

    // foreach ($actividad as $activ) {
    //     $sqlDel="DELETE FROM usuarios_actividades WHERE usuarios_actividades.idActividad = :idActividad";
    //     $query = $conexionDB->prepare($sqlDel);
    //     $query ->bindParam(':idActividad', $actividad);
    //     $query->execute();
    //     print_r("query: ".$query);
    // };


}

?>
<style>
    #customers {
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                Perfil de Usuario
            </h5>
            <div class="row">
                <div>
                    <div class="card p-3">
                        <br>
                        <div class="card card-header bg-secondary text-light">
                            <h5 class="fs-4 text-center text-warning">
                                <i>
                                    <?php echo  $usuario; ?>
                                </i>
                            </h5>
                            <?php if ($foto) : ?>
                                <div class="text-center">
                                    <img src="../public/img/<?php echo $foto; ?>" class="img-thumbnail img-fluid rounded" width="100" alt="<?php echo $usuario; ?>" />
                                </div>
                            <?php endif; ?>
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

                        <?php if ($actividad) : ?>

                            <div>
                                <h5 class="fs-5 text-center">
                                    Actividades
                                </h5>
                            </div>

                            <div class="table-responsive card-background">
                                <table class="table" id="customers">
                                    <thead>
                                        <tr>
                                            <th class="bg-secondary text-warning">ACTIVIDAD</th>
                                            <th class="bg-secondary text-warning">LUGAR DE DESARROLLO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php
                                                foreach ($actividad as $activ) { ?>
                                                    <li class="list-group-item p-2">
                                                        🟠<?php echo $activ['nombre_actividad']; ?>
                                                    </li>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($actividad as $activ) { ?>
                                                    <li class="list-group-item p-2">
                                                        🟫<?php echo $activ['lugar']; ?>
                                                    </li>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    //new TomSelect('#listaActividades');

    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });
</script>
<?php include("../view/head/footer.php"); ?>