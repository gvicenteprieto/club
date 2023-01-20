<?php include("../head/header.php"); //require_once("C://wamp64/www/login/view/head/header.php");
?>

<?php include("../../config/db.php"); //require_once("C://xampp3/htdocs/login/config/db.php");

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
    }
}
?>

<!-- <div class="fondo_login"> -->
<div class="fondo_login2">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">Editar Perfil</h5>
                <div class="row mt-5">
                    <div>
                        <form action="updated.php" method="post" class="row g-3" autocomplete="off">
                            <div class="col-sm-3 text-center">
                                <label for="usuario" 
                                class="form-label m-1 fw-bold fs-5 p-2">Usuario:</label>
                            </div>
                            <div class="mb-3 col-sm-9">
                                <div >
                                    <input type="text" 
                                        class="form-control fw-bold fs-4 text-center text-success p-2" 
                                        id="usuario" name="usuario" 
                                        value="<?php echo  $_SESSION['usuario']; ?>" 
                                        aria-describedby="usuario" placeholder="Usuario" 
                                        aria-label="usuario">
                                </div>
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="dni" class="form-label text-light">DNI (sólo números):</label>
                                <input type="text" class="form-control" id="dni" 
                                    name="dni" value="<?php echo  $dni; ?>" 
                                    aria-describedby="dni">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="apellidos" class="form-label text-light">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" 
                                    value="<?php echo  $apellidos; ?>" 
                                    aria-describedby="apellidos">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="nombres" class="form-label text-light">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" 
                                    value="<?php echo  $nombres; ?>" 
                                    aria-describedby="nombres">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="email" class="form-label text-light">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                    value="<?php echo  $email; ?>" 
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="pass" class="form-label text-light">Contraseña:</label>
                                <input type="password" class="form-control" id="pass" name="pass" 
                                value="">
                            </div>
                            <div class="mb-3 col-sm-6">
                                <label for="confirmPass" class="form-label text-light">Repita Contraseña:</label>
                                <input type="password" class="form-control" id="confirmPass" name="confirmPass" 
                                value="">
                            </div>
                            <hr class="text-light">
                            <?php if (!empty($_GET['error'])) : ?>
                                <div id="alertError" class="d-grid gap-2 btn mb-2 text-danger bg-warning" 
                                style="font-weight: bold; text-align: center; margin: auto" role="alert">
                                    <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-12 d-grid gap-2">
                                <button type="submit" class="btn btn-success fw-bold">
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../head/footer.php"); ?>