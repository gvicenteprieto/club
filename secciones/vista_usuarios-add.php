<?php include('../view/head/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
     header("Location:../view/home/panelControl.php");
 }
?>
<?php include('../secciones/usuarios.php'); ?>

<div class="fondo_login">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="vista_usuarios.php" method="post">
                            <div class="card card-background p-1">
                                <br>
                                <div class="btn-success bg-success card card-header fw-bold text-light  m-3">
                                Gestión de ALTA usuarios
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-3">
                                        <label for="usuario" class="form-label text-secondary">Usuario</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="usuario" id="usuario" required placeholder="Usuario">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="dni" class="form-label text-secondary">DNI</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" name="dni" id="dni" 
                                            value="<?php echo $dni; ?>" required placeholder="Documento Nacional de Identidad">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="apellidos" class="form-label text-secondary">Apellidos</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" name="apellidos" id="apellidos" 
                                            value="<?php echo $apellidos; ?>" required placeholder="Apellidos">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="nombres" class="form-label text-secondary">Nombres</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" name="nombres" id="nombres" 
                                            value="<?php echo $nombres; ?>" required placeholder="Nombres">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="email" class="form-label text-secondary">Email</label>
                                        <input type="email" class="form-control bg-primary-subtle text-primary-emphasis" name="email" id="email" 
                                            value="<?php echo $email; ?>" required placeholder="Correo Electrónico">
                                    </div>
                                    <div class="mb-3 col-3"></div>
                                    <div class="mb-3 col-3"></div>
                                    <div class="col-6 btn-group d-flex mt-3" role="group" aria-label="Button group name">
                                        <button type="submit" name="accion" value="agregar" 
                                            class="btn btn-success boton_nav-estad">AGREGAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container text-center mt-3">
                        <div class="row justify-content-between">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div>
                                    <a href="./vista_usuarios.php" class="btn btn-secondary m-2 boton_nav-estad">
                                        REGRESAR
                                    </a>
                                </div>
                            </div>
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