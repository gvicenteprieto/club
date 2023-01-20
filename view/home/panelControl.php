<?php include("../head/header.php"); //require_once("C://wamp64/www/login/view/head/header.php");

if (empty($_SESSION['usuario'])) {
    header("Location:login.php");
}
?>

<div class="fondo_login2">

    <?php if ($_SESSION['usuario'] == "root") : ?>
        <div class="container p-5">
            <div class="row">
                <div class="col-12">
                    <h5 class="p-2 text-center text-success card bg-light mb-3">Primer acceso, por favor ingrese sus datos</h5>
                    <!-- <h5 class="text-center mb-4"><i>Por favor ingrese sus datos</i></h5> -->
                    <div class="row mt-5">
                        <div>
                            <form action="store.php" method="post" class="row g-3" autocomplete="off">
                                <div class="col-sm-3 text-center">
                                    <label for="usuario" 
                                        class="form-label m-1 fw-bold fs-5 p-2">Usuario:</label>
                                </div>
                                <div class="mb-3 col-sm-9">
                                    <div >
                                        <input type="text" 
                                            class="form-control fw-bold fs-4 text-center text-success p-2" 
                                            id="usuario" name="usuario" 
                                            value="" 
                                            aria-describedby="usuario" required 
                                            aria-label="usuario">
                                        <p class="form-text text-center text-light">Elija un nombre de usuario</p>
                                    </div>
                                </div>
                                <div class="mb-3  col-sm-6">
                                    <label for="dni" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" id="dni" 
                                        name="dni" value="<?= (!empty($_GET['dni'])) ? $_GET['dni'] : "" ?>" 
                                        aria-describedby="dni">
                                    <small class="form-text text-light">Ingrese su número de DNI, sólo número, sin puntos</small>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="apellidos" class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                                        value="<?= (!empty($_GET['apellidos'])) ? $_GET['apellidos'] : "" ?>" 
                                        aria-describedby="apellidos">
                                    <small class="form-text text-light">Ingrese su o sus Apellidos</small>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="nombres" class="form-label">Nombres:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" 
                                        value="<?= (!empty($_GET['nombres'])) ? $_GET['nombres'] : "" ?>" 
                                        aria-describedby="nombres">
                                        <small class="form-text text-light">Ingrese su o sus Nombres</small>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                        value="<?= (!empty($_GET['email'])) ? $_GET['email'] : "" ?>" 
                                        aria-describedby="emailHelp">
                                    <small class="form-text text-light">Ingrese su correo electrónico</small>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="pass" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="pass" name="pass" 
                                        value="<?= (!empty($_GET['pass'])) ? $_GET['pass'] : "" ?>">
                                    <small class="form-text text-light">Ingrese una Contraseña</small>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="confirmPass" class="form-label">Repita Contraseña:</label>
                                    <input type="password" class="form-control" id="confirmPass" 
                                        name="confirmPass" 
                                        value="<?= (!empty($_GET['confirmPass'])) ? $_GET['confirmPass'] : "" ?>">
                                    <small class="form-text text-light">Repita la misma contraseña</small>
                                </div>
                                <hr class="text-light">

                                <?php if (!empty($_GET['error'])) : ?>

                                <div id="alertError" class="d-grid gap-2 btn mb-2 text-danger bg-warning" 
                                    style="font-weight: bold; text-align: center; margin: auto" role="alert"> 
                                    <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
                                </div>
                                <?php endif; ?>
                                <div class="col-sm-12 d-grid gap-2">
                                    <button type="submit" class="btn btn-primary fw-bold">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($_SESSION['usuario'] == "admin") : ?>
        
        <?php header("Location:/login/index.php"); ?>

    <?php elseif ($_SESSION['usuario'] !== "root") : ?>

        <?php header("Location:/login/secciones/vista_usuario.php"); ?>

    <?php endif; ?>

</div>

<?php include("../head/footer.php"); ?>