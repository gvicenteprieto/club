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
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2 bg-secondary text-warning text-center card fw-bold">
                                <h5 class="mt-2">
                                    <i>
                                        <?php echo $usuario; ?>
                                    </i>
                                </h5>
                            </div>
                            <div class="col-5"></div>
                            <?php if ($foto) : ?>
                                <div class="text-center mt-3">
                                    <img src="../public/img/<?php echo $foto; ?>" class="img-thumbnail img-fluid rounded" width="100" alt="<?php echo $usuario; ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive card-background">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">DNI</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Email</th>
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
            <div class="container text-center mt-3">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <form action="/login/secciones/vista_usuarios-edit.php" method="post">
                            <div role="group" aria-label="Button group name">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
                                <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" class="btn btn-warning m-2">
                                    Edición registro de Usuario
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                        <div>
                            <a href="./vista_usuarios.php" class="btn btn-secondary m-2">
                                REGRESAR
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<?php include("../view/head/footer.php"); ?>