<?php include("../head/header.php");
if (empty($_SESSION['usuario'])) {
    header("Location:login.php");
}
?>

<!-- <style> 
.divx {
  width: 200px;
  height: 100px;
  background: green;
  transition: width 2s;
}

.divx:hover {
  width: 300px;
}
</style> -->

<div class="fondo_login">
    <?php if ($_SESSION['usuario'] == "root") : ?>
        <div class="container p-5">
            <div class="row">
                <div class="col-12">
                    <h5 class="p-2 text-center text-success card bg-light mb-3">Primer acceso, por favor ingrese sus datos</h5>
                    <div class="row mt-5">
                        <form action="store.php" method="post" autocomplete="off">
                            <div class="d-grid gap-2">
                                <div class="row col-12">
                                    <div class="col-9 text-end p-2 text-secondary fw-bold">Elija un nombre de usuario: </div>
                                    <div class="col-3 text-warning text-center fw-bold">
                                        <div>
                                            <input type="text" class="form-control fw-bold fs-4 text-center text-success p-2" 
                                            id="usuario" name="usuario" value="" aria-describedby="usuario" required aria-label="usuario">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="mb-3 col-4">
                                        <label for="dni" class="form-label text-secondary">DNI:</label>
                                        <input type="text" class="form-control text-primary-emphasis" id="dni" name="dni" 
                                            value="<?= (!empty($_GET['dni'])) ? $_GET['dni'] : "" ?>" aria-describedby="dni">
                                        <small class="form-text text-light">Ingrese su número de DNI, sólo número, sin puntos</small>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="apellidos" class="form-label text-secondary">Apellidos:</label>
                                        <input type="text" class="form-control text-primary-emphasis" id="apellidos" name="apellidos" 
                                            value="<?= (!empty($_GET['apellidos'])) ? $_GET['apellidos'] : "" ?>" aria-describedby="apellidos">
                                        <small class="form-text text-light">Ingrese su o sus Apellidos</small>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="nombres" class="form-label text-secondary">Nombres:</label>
                                        <input type="text" class="form-control text-primary-emphasis" id="nombres" name="nombres" 
                                            value="<?= (!empty($_GET['nombres'])) ? $_GET['nombres'] : "" ?>" aria-describedby="nombres">
                                        <small class="form-text text-light">Ingrese su o sus Nombres</small>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="mb-3 col-4">
                                        <label for="email" class="form-label text-secondary">Email:</label>
                                        <input type="email" class="form-control text-primary-emphasis" id="email" name="email" 
                                            value="<?= (!empty($_GET['email'])) ? $_GET['email'] : "" ?>" aria-describedby="emailHelp">
                                        <small class="form-text text-light">Ingrese su correo electrónico</small>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="pass" class="form-label text-secondary">Contraseña:</label>
                                        <input type="password" class="form-control text-primary-emphasis" id="pass" name="pass" 
                                            value="<?= (!empty($_GET['pass'])) ? $_GET['pass'] : "" ?>">
                                        <small class="form-text text-light">Ingrese una Contraseña</small>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="confirmPass" class="form-label text-secondary">Confirme:</label>
                                        <input type="password" class="form-control text-primary-emphasis" id="confirmPass" name="confirmPass" 
                                            value="<?= (!empty($_GET['confirmPass'])) ? $_GET['confirmPass'] : "" ?>">
                                        <small class="form-text text-light">Repita la misma contraseña</small>
                                    </div>
                                </div>
                                <hr class="text-light">
                                <?php if (!empty($_GET['error'])) : ?>

                                    <div id="alertError" class="d-grid gap-2 btn mb-2 text-light bg-danger" 
                                        style="font-weight: bold; text-align: center; margin: auto" role="alert">
                                        <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 d-grid gap-2">
                                <button type="submit" class="btn btn-primary fw-bold">Registrar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($_SESSION['usuario'] == "admin") : ?>
        <div class="container px-4 py-5">
        <!-- <h1 class="animate__animated animate__bounce">An animated element</h1> -->
        
            <h2 class="pb-1 border-bottom text-warning animate__animated animate__backInDown mt-3">
                Secciones
            </h2>
            <div class="grid mt-5">
                <div class="row justify-content-around">
                    <div class="row col-12 animate__animated animate__fadeInDownBig">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div >
                                <div >
                                    <h3 class="fs-3 text-light">
                                        Usuarios
                                    </h3>
                                    <p>
                                        Usuarios habilitados.
                                    </p>
                                    <a href="../../secciones/vista_usuarios.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <div>
                                <div>
                                    <h3 class="fs-3 text-light">
                                        Actividades
                                    </h3>
                                    <p>
                                        Actividades disponibles.
                                    </p>
                                    <a href="../../secciones/vista_actividades.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-12 m-5"></div>
                    <div class="row col-12 animate__animated animate__zoomInDown">
                        <div class="col-1"></div>
                        <div class="col-6">
                            <div>
                                <h3 class="fs-3 text-light">
                                    Socios
                                </h3>
                                <p>
                                    Gestión de socios.
                                </p>
                                <div>
                                    <a href="../../secciones/vista_socios.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <div>
                                <div>
                                    <h3 class="fs-3 text-light">
                                        Comisiones
                                    </h3>
                                    <p>
                                        Listado de comisiones.
                                    </p>
                                    <a href="../../secciones/vista_comisiones.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($_SESSION['usuario'] !== "root") : ?>
        <div class="container px-4 py-5">
            <h2 class="pb-1 border-bottom text-warning animate__animated animate__backInDown mt-3">
                Secciones
            </h2>
            <div class="grid mt-5">
                <div class="row">
                    <div class="container row col-12 animate__animated animate__zoomInDown">
                        <div class="col-1"></div>
                        <div class="col-3">
                            <div>
                                <h3 class="fs-3 text-light">
                                    Socios
                                </h3>
                                <p>
                                    Gestión de socios.
                                </p>
                                <div>
                                    <a href="../../secciones/vista_socios.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3">
                            <div>
                                <div>
                                    <h3 class="fs-3 text-light">
                                        Actividades
                                    </h3>
                                    <p>
                                        Actividades disponibles.
                                    </p>
                                    <a href="../../secciones/vista_actividades.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3">
                            <div>
                                <div>
                                    <h3 class="fs-3 text-light">
                                        Comisiones
                                    </h3>
                                    <p>
                                        Listado de comisiones.
                                    </p>
                                    <a href="../../secciones/vista_comisiones.php" class="btn btn-success">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include("../head/footer.php"); ?>