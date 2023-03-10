<?php include("../head/header.php"); ?>
<?php
if (empty($_SESSION['usuario'])) {
    header("Location:panelControl.php");
}
?>
<?php include("../../config/db.php");
$conexionDB = database::crearInstancia();
if ($_SESSION['usuario']) {
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':usuario', $usuario);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        $dni = $user['dni'];
        $usuario = $user['usuario'];
        $apellidos = $user['apellidos'];
        $nombres = $user['nombres'];
        $email = $user['email'];
        $foto = $user['foto'];
    }
};
?>

<!-- <div class="fondo_login"> -->
<div class="fondo_login2">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">Editar Perfil</h5>
                <div class="row mt-5">
                    <div>
                        <form action="updated.php" method="post" enctype="multipart/form-data" class="row g-3" autocomplete="off">
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
                            <div class="mb-3 col-2">
                                <label for="dni" class="form-label text-light">DNI:</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo  $dni; ?>" 
                                    aria-describedby="dni">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="apellidos" class="form-label text-light">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo  $apellidos; ?>" 
                                    aria-describedby="apellidos">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="nombres" class="form-label text-light">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo  $nombres; ?>" 
                                    aria-describedby="nombres">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="email" class="form-label text-light">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo  $email; ?>" 
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="pass" class="form-label text-light">Contraseña:</label>
                                <input type="password" class="form-control" id="pass" name="pass" required value="">
                            </div>
                            <div class="mb-3 col-2">
                                <label for="confirmPass" class="form-label text-light">Confirme:</label>
                                <input type="password" class="form-control" id="confirmPass" name="confirmPass" required value="">
                            </div>
                            <hr class="text-light">
                            <?php if (!empty($_GET['error'])) : ?>
                                <div id="alertError" class="d-grid gap-2 btn mb-2 text-danger bg-warning" 
                                    style="font-weight: bold; text-align: center; margin: auto" role="alert">
                                    <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
                                </div>
                            <?php endif; ?>
                            <div class="row col-12">
                                <div class="col-6">
                                    <label for="foto"><small>Subir imágen para agregar al perfil</small></label>
                                    <input type="file" class="form-control-file btn btn-warning" name="foto" id="foto" />
                                </div>
                                <div class="col-6">
                                    <div class="row col-12">
                                        <div class="col-5"></div>
                                        <div class="col-7 bg-warning text-warning text-center card fw-bold mt-4">
                                            <button type="submit" class="btn btn-warning fw-bold">
                                                ACTUALIZAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container row text-center mt-3">
                <div class="col-8"></div>
                <div class="col-4">
                    <div>
                        <a href="./panelControl.php" class="btn btn-secondary m-2">
                            REGRESAR
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../head/footer.php"); ?>